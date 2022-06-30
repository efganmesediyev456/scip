<?php

namespace App\Http\Resources;

use App\Models\Admin;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
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
            'email' => $admin->email,
            'picture' => $admin->getFirstMediaUrl('picture'),
            'password_changed_at' => $admin->password_changed_at?->diffForHumans(now())
        ];
    }
}
