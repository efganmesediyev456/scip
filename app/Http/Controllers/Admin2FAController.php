<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Services\Sms\SmsHandler;
use App\Traits\HasTwoFactorSecurity;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class Admin2FAController extends ApiController
{
    use HasTwoFactorSecurity;

    public function tfaDetails(): Response
    {
        /** @var $admin Admin */
        $admin = Auth::guard('admin')->user();

        return response([
            'secret' => $secret = $this->createSecret(),
            'qr' => $this->getQRCodeGoogleUrl($admin->email, $secret, config('app.name')),
            'enabled' => !blank($admin->tfa_secret)
        ]);
    }

    public function tfaEnable(Request $request): Response
    {
        $request->validate([
            'secret' => 'required|string',
            'pin' => 'required|string'
        ]);

        /** @var $admin Admin */
        $admin = Auth::guard('admin')->user();

        if (!$this->verifyCode($request->input('secret'), $request->input('pin'))) {
            abort(Response::HTTP_BAD_REQUEST, __('wrong-two-factor-code'));
        }

        $admin->tfa_secret = $request->input('secret');
        $admin->sms_enabled = false;
        $admin->save();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function tfaDisable(): Response
    {
        /** @var $admin Admin */
        $admin = Auth::guard('admin')->user();

        $admin->tfa_secret = null;
        $admin->save();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function smsDetails(): Response
    {
        /** @var $admin Admin */
        $admin = Auth::guard('admin')->user();

        return response([
            'enabled' => $admin->sms_enabled
        ]);
    }

    public function sendOTP(SmsHandler $smsGateway): Response
    {
        $otp = mt_rand(100001, 999998);

        /** @var $admin Admin */
        $admin = Auth::guard('admin')->user();

        if (Cache::has("admin-user:$admin->id-otp")) {
            abort(Response::HTTP_BAD_REQUEST, __('wait-previous-otp'));
        }

        Cache::set("admin-user:$admin->id-otp", $otp, now()->addMinutes(3));

        $smsGateway->to($admin->phone)->send("OTP: <hidden>$otp</hidden>. Available for next 3 minutes.");

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function smsEnable(Request $request): Response
    {
        $request->validate([
            'pin' => 'required|string'
        ]);

        /** @var $admin Admin */
        $admin = Auth::guard('admin')->user();

        if (Cache::missing("admin-user:$admin->id-otp") ||
            Cache::get("admin-user:$admin->id-otp") != $request->input('pin')) {
            abort(Response::HTTP_BAD_REQUEST, __('otp-incorrect'));
        }

        $admin->sms_enabled = true;
        $admin->tfa_secret = null;

        $admin->save();

        Cache::forget("admin-user:$admin->id-otp");

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function smsDisable(): Response
    {
        /** @var $admin Admin */
        $admin = Auth::guard('admin')->user();

        $admin->sms_enabled = false;
        $admin->tfa_secret = null;

        $admin->save();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
