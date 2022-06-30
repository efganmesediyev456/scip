<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdminResource;
use App\Models\Admin;
use App\Models\Session;
use App\Rules\Recaptcha;
use App\Services\Sms\SmsHandler;
use App\Traits\HasTwoFactorSecurity;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminAuthController extends ApiController
{
    use HasTwoFactorSecurity;

    public function login(Request $request, SmsHandler $smsGateway): Response
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'recaptcha_token' => [new Recaptcha('login')],
            'pin' => 'sometimes|required'
        ]);

        $admin = Admin::whereEmail($request->input('email'))->first();

        if (!$admin || !Hash::check($request->input('password'), $admin->password)) {
            throw new ModelNotFoundException(__('auth.failed'), Response::HTTP_BAD_REQUEST);
        }

        if ($admin->sms_enabled) {
            if ($request->missing('pin')) {
                if (Cache::has("admin-user:$admin->id-otp")) {
                    abort(Response::HTTP_BAD_REQUEST, __('wait-previous-otp'));
                }

                $otp = mt_rand(100001, 999998);

                Cache::set("admin-user:$admin->id-otp", $otp, now()->addMinutes(3));

                $smsGateway->to($admin->phone)->send("OTP: <hidden>$otp</hidden>. Available for next 3 minutes.");

                return response([
                    'pin_enabled' => true,
                ]);
            } elseif (Cache::missing("admin-user:$admin->id-otp") ||
                Cache::get("admin-user:$admin->id-otp") != $request->input('pin')) {
                return response([
                    'pin_enabled' => true,
                    'message' => __('invalid-login-code')
                ], Response::HTTP_BAD_REQUEST);
            }
        }

        if ($admin->tfa_secret) {
            if ($request->missing('pin')) {
                return response([
                    'pin_enabled' => true,
                ]);
            } elseif (!$this->verifyCode($admin->tfa_secret, $request->input('pin'))) {
                return response([
                    'pin_enabled' => true,
                    'message' => __('invalid-login-code')
                ], Response::HTTP_BAD_REQUEST);
            }
        }

        $payload = [
            'iss' => 'admin',
            'sub' => $admin->id,
            'iat' => now()->timestamp,
            'session' => $sessionId = mt_rand(),
            'sig' => sha1($sessionId . config('jwt.salt')),
            'exp' => ($expire = now()->addSeconds(config('jwt.token_ttl')))->timestamp
        ];

        $privateKey = Storage::get('jwt');

        $token = JWT::encode($payload, $privateKey, 'RS512');

        $userAgent = $request->userAgent();
        $ip = $request->ip();

        $admin->saveSession([
            'identifier' => $sessionId,
            'expires_at' => $expire,
            'user_agent' => $userAgent,
            'ip' => $ip,
            'location' => $request->header('cf-ipcountry', 'Unknown'),
        ]);

        return response([
            'expires_at' => $expire->timestamp,
            'access_token' => $token
        ]);
    }

    public function me(): AdminResource
    {
        $admin = Auth::guard('admin')->user();

        return new AdminResource($admin);
    }

    public function logout(Request $request): Response
    {
        /** @var $admin Admin */
        $admin = Auth::guard('admin')->user();

        $publicKey = Storage::get('jwt.pub');

        try {
            $jwt = JWT::decode($request->bearerToken(), new Key($publicKey, 'RS512'));
        } catch (ExpiredException $e) {
            abort(Response::HTTP_UNAUTHORIZED);
        }

        /** @var $session Session */
        $session = $admin->sessions()->whereIdentifier($jwt->session)->firstOrFail();
        $session->expires_at = now();
        $session->save();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function refresh(Request $request): Response
    {
        $token = $request->bearerToken();

        abort_if(blank($token), Response::HTTP_UNAUTHORIZED, 'Missing token');

        $publicKey = Storage::get('jwt.pub');

        JWT::$leeway = 720000;

        try {
            $payload = JWT::decode($token, new Key($publicKey, 'RS512'));
        } catch (\Throwable $e) {
            abort(Response::HTTP_UNAUTHORIZED, 'Invalid token');
        }

        abort_if(blank($payload->iss), Response::HTTP_UNAUTHORIZED, 'Unknown issuer');
        abort_if($payload->iss !== config('auth.guards.admin.provider'), Response::HTTP_UNAUTHORIZED, 'Invalid issuer');
        abort_if(blank($payload->sub), Response::HTTP_UNAUTHORIZED, 'Unknown subject');
        abort_if(blank($payload->sig), Response::HTTP_UNAUTHORIZED, 'Missing signature');
        abort_if($payload->sig !== sha1($payload->session . config('jwt.salt')), Response::HTTP_UNAUTHORIZED, 'Invalid signature');
        abort_if(now()->timestamp > $payload->iat + config('jwt.refresh_ttl'), Response::HTTP_UNAUTHORIZED, 'Expired refresh request');
        abort_if(now()->timestamp < $payload->exp, Response::HTTP_UNAUTHORIZED, 'Earlier refresh request');

        $payload->iat = now()->timestamp;
        $payload->exp = ($expire = now()->addSeconds(config('jwt.token_ttl')))->timestamp;

        Session::whereIdentifier($payload->session)->firstOrFail()->update([
            'expires_at' => $expire
        ]);

        $privateKey = Storage::get('jwt');

        $token = JWT::encode((array) $payload, $privateKey, 'RS512');

        return response([
            'expires_at' => $expire->timestamp,
            'access_token' => $token
        ]);
    }
}
