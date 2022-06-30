<?php

namespace App\Http\Resources;

use App\Models\Admin;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class AdminUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        /** @var $admin Admin */
        $admin = $this;

        return [
            'id' => $admin->id,
            'name' => $admin->name,
            'company' => $admin->company,
            'position' => $admin->position,
            'phone' => $admin->phone,
            'created_at' => $admin->created_at->diffForHumans(now()),
            'role' => $admin->role
        ];
    }
}
