<?php

namespace App\Support\Authentication;

use App\Models\Session;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Auth\GuardHelpers;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Throwable;

class JwtGuard implements Guard
{
    use GuardHelpers;

    private Request $request;

    private string $providerName;

    private ?Session $session = null;

    public function __construct(UserProvider $provider, Request $request, string $providerName)
    {
        $this->setProvider($provider);

        $this->request = $request;

        $this->providerName = $providerName;
    }

    public function check(): bool
    {
        $token = $this->request->bearerToken();

        if (!$token || $token === "null") {
            return false;
        }

        $publicKey = Storage::get('jwt.pub');

        try {
            $payload = JWT::decode($token, new Key($publicKey, 'RS512'));
        } catch (Throwable $e) {
            return false;
        }

        if (empty($payload->iss) || $payload->iss !== $this->providerName) {
            return false;
        }

        if (empty($payload->sub)) {
            return false;
        }

        if (empty($payload->exp) || $payload->exp <= time()) {
            return false;
        }

        if (empty($payload->sig) || $payload->sig !== sha1($payload->session . config('jwt.salt'))) {
            return false;
        }

        $this->session = Session::whereSessionableId($payload->sub)
            ->where('expires_at', '>', now())
            ->whereIdentifier($payload->session)->first();

        if (!$this->session) {
            return false;
        }

        return true;
    }

    public function user(): ?Authenticatable
    {
        $token = $this->request->bearerToken();

        abort_if(!$token || $token === "null", Response::HTTP_UNAUTHORIZED, "Unauthorized");

        $userId = $this->id();

        if (!$this->hasUser()) {
            $user = $this->provider->retrieveById($userId);

            abort_if(!$user, Response::HTTP_UNAUTHORIZED, "Unauthorized");

            $this->setUser($user);
        }

        return $this->user;
    }

    public function session(): Session
    {
        return $this->session;
    }

    public function id(): int|string|null
    {
        $token = $this->request->bearerToken();

        abort_if(!$token || $token === "null", Response::HTTP_UNAUTHORIZED, "Unauthorized");

        $publicKey = Storage::get('jwt.pub');

        $payload = JWT::decode($token, new Key($publicKey, 'RS512'));

        return $payload->sub;
    }

    public function validate(array $credentials = []): bool
    {
        return $this->hasUser();
    }
}
