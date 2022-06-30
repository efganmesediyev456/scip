<?php

namespace App\Http\Resources;

use App\Models\Field;
use Illuminate\Http\Resources\Json\JsonResource;

class PageFieldResource extends JsonResource
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
            'identifier' => $field->identifier,
            'name' => $field->name->{app()->getLocale()},
            'placeholder' => $field->placeholder->{app()->getLocale()},
            'required' => $field->required,
            'min_length' => $field->min_length,
            'max_length' => $field->max_length,
            'min' => $field->min,
            'max' => $field->max,
            'type' => $field->type,
            'translated' => $field->translated,
            'step' => $field->step,
            'field_values' => $this->when($field->hasValues(), FieldValueListResource::collection($field->values))
        ];
    }
}
