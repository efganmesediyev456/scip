<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdminUserResource;
use App\Models\Admin;
use App\Notifications\NewPasswordNotification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminUserController extends ApiController
{
    public function index(): ResourceCollection
    {
        /** @var $admin Admin */
        $admin = Auth::guard('admin')->user();

        $admins = Admin::orderBy($this->orderBy, $this->orderDir)->whereKeyNot($admin->id);

        if (!blank($this->keywords)) {
            $admins->where(function (Builder $query) {
                $query->where('name', 'ilike', '%' . $this->keywords . '%');
                $query->orWhere('company', 'ilike', '%' . $this->keywords . '%');
                $query->orWhere('position', 'ilike', '%' . $this->keywords . '%');
                $query->orWhere('phone', 'ilike', '%' . $this->keywords . '%');
            });
        }

        if ($this->paginate) {
            $admins = $admins->paginate($this->perPage);
        } else {
            $admins = $admins->get();
        }

        return AdminUserResource::collection($admins);
    }

    public function store(Request $request): Response
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'role' => ['required', Rule::in(array_keys(config('admin.roles')))],
        ]);

        $admin = new Admin();

        $admin->name = $request->input('name');
        $admin->position = $request->input('position');
        $admin->company = $request->input('company');
        $admin->phone = $request->input('phone');
        $admin->email = $request->input('email');
        $admin->role = $request->input('role');
        $admin->password = Hash::make(Str::random(20));

        $admin->save();

        $admin->notify((new NewPasswordNotification())->onQueue('mail'));

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function destroy(int $id): Response
    {
        /** @var $admin Admin */
        $admin = Admin::findOrFail($id);

        abort_if($admin->is(Auth::guard('admin')->user()), Response::HTTP_BAD_REQUEST, __('you_cant_edit_yourself'));

        $admin->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function show(int $id): AdminUserResource
    {
        /** @var $admin Admin */
        $admin = Admin::findOrFail($id);

        abort_if($admin->is(Auth::guard('admin')->user()), Response::HTTP_BAD_REQUEST, __('you_cant_edit_yourself'));

        return new AdminUserResource($admin);
    }

    public function update(int $id, Request $request): Response
    {
        /** @var $admin Admin */
        $admin = Admin::findOrFail($id);

        abort_if($admin->is(Auth::guard('admin')->user()), Response::HTTP_BAD_REQUEST, __('you_cant_edit_yourself'));

        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'role' => ['required', Rule::in(array_keys(config('admin.roles')))],
        ]);

        $admin->name = $request->input('name');
        $admin->position = $request->input('position');
        $admin->company = $request->input('company');
        $admin->phone = $request->input('phone');
        $admin->role = $request->input('role');

        $admin->save();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function resetPassword(int $id): Response
    {
        /** @var $admin Admin */
        $admin = Admin::findOrFail($id);

        abort_if($admin->is(Auth::guard('admin')->user()), Response::HTTP_BAD_REQUEST, __('you_cant_edit_yourself'));

        $admin->notify((new NewPasswordNotification())->onQueue('mail'));

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
