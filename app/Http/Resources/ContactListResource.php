<?php

namespace App\Http\Resources;

use App\Models\Field;
use App\Models\Post;
use App\Models\PostField;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ContactListResource extends JsonResource
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
            'id' => $field->id,
            'name' => $field->name,
            'surname' => $field->surname,
            'email' => $field->email,
            'mobile' => $field->mobile,
            'topic' => $field->topic,
            'message' => $field->message,
        ];
    }
}
