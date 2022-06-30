<?php

namespace App\Http\Controllers;

use App\Http\Resources\SessionResource;
use App\Models\Admin;
use App\Models\Session;
use App\Rules\TemporaryFile;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as SessionHandler;

class AdminProfileController extends ApiController
{
    public function updateProfile(Request $request): Response
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'profile' => ['sometimes', 'nullable', new TemporaryFile()]
        ]);

        /** @var $admin Admin */
        $admin = Auth::guard('admin')->user();

        $admin->company = $request->input('company');
        $admin->position = $request->input('position');
        $admin->phone = $request->input('phone');
        $admin->name = $request->input('name');

        $admin->save();

        if ($request->has('profile')) {
            if ($request->input('profile') !== null) {
                $admin
                    ->addMediaFromDisk($request->input('profile'), 'temporary')
                    ->toMediaCollection('picture');
            } elseif ($admin->hasMedia('picture')) {
                $admin->getFirstMedia('picture')->delete();
            }
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function changePassword(Request $request): Response
    {
        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|max:25|confirmed'
        ]);

        /** @var $admin Admin */
        $admin = Auth::guard('admin')->user();

        abort_unless(Hash::check($request->input('current_password'), $admin->password), Response::HTTP_BAD_REQUEST, __('wrong-current-password'));

        abort_if(Hash::check($request->input('password'), $admin->password), Response::HTTP_BAD_REQUEST, __('the-same-current-password'));

        $admin->password = Hash::make($request->input('password'));
        $admin->password_changed_at = now();

        $admin->save();

        $otherSessions = $admin->sessions()->get()->reject(fn (Session $session) => $session->expires_at->isPast());

        foreach ($otherSessions as $session) {
            $session->expires_at = now();
            $session->save();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function sessions(): ResourceCollection
    {
        /** @var $admin Admin */
        $admin = Auth::guard('admin')->user();

        $sessions = $admin->sessions()->orderBy($this->orderBy, $this->orderDir);

        if (!blank($this->keywords)) {
            $sessions->where(function (Builder $query) {
                $query->where('ip', 'ilike', '%' . $this->keywords . '%');
                $query->orWhere('user_agent', 'ilike', '%' . $this->keywords . '%');
                $query->orWhere('location', 'ilike', '%' . $this->keywords . '%');
            });
        }

        if ($this->paginate) {
            return SessionResource::collection($sessions->paginate($this->perPage));
        }

        return SessionResource::collection($sessions->get());
    }

    public function expireSession(int $id): Response
    {
        /** @var $admin Admin */
        $admin = Auth::guard('admin')->user();

        /** @var $session Session */
        $session = $admin->sessions()->findOrFail($id);
        $session->expires_at = now();
        $session->save();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function expireOtherSessions(): Response
    {
        /** @var $admin Admin */
        $admin = Auth::guard('admin')->user();

        /** @var $currentSession Session */
        $currentSession = Auth::guard('admin')->session();

        $otherSessions = $admin->sessions()
            ->where('identifier', '!=', $currentSession->identifier)
            ->where('expires_at', '>', now());

        abort_if($otherSessions->doesntExist(), Response::HTTP_BAD_REQUEST, __("no-session-exists"));

        $otherSessions->update([
           'expires_at' => now()
        ]);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
