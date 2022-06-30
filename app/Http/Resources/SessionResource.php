<?php

namespace App\Http\Resources;

use App\Models\Session;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SessionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var $session Session */
        $session = $this->resource;

        /** @var $currentSession Session */
        $currentSession = Auth::guard('admin')->session();

        return [
            'id' => $session->id,
            'ip_address' => $session->ip,
            'status' => $session->identifier === $currentSession->identifier ? '<span class="badge bg-primary">current</span>' : (
                $session->expires_at->isPast() ? '<span class="badge bg-danger">expired</span>' : '<span class="badge bg-warning">active</span>'
            ),
            'location' => $session->location,
            'device' => $session->device,
            'created_at' => $session->created_at->diffForHumans(now()),
            'can_be_expired' => $session->expires_at->isFuture() && $session->identifier !== $currentSession->identifier
        ];
    }
}
