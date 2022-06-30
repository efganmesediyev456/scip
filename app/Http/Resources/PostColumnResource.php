<?php

namespace App\Http\Resources;

use App\Models\Field;
use Illuminate\Http\Resources\Json\JsonResource;

class PostColumnResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var $field Field */
        $field = $this->resource;

        return [
            'name' => localized($field->name),
            'key' => $field->identifier,
            'orderBy' => false
        ];
    }
}
