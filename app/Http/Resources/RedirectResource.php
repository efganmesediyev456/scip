<?php

namespace App\Http\Resources;

use App\Models\Redirect;
use Illuminate\Http\Resources\Json\JsonResource;

class RedirectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var $redirect Redirect */
        $redirect = $this->resource;

        return [
            'id' => $redirect->id,
            'regex' => $redirect->regex,
            'destination' => $redirect->destination
        ];
    }
}
