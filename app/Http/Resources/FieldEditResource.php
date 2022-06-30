<?php

namespace App\Http\Resources;

use App\Models\Field;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class FieldEditResource extends JsonResource
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
            'placeholder' => $field->placeholder,
            'min' => $field->min,
            'max' => $field->max,
            'max_length' => $field->max_length,
            'min_length' => $field->min_length,
            'translated' => $field->translated,
            'type' => $field->type,
            'group_type' => $field->field_group_type,
            'group_value' => $field->field_group_value,
            'required' => $field->required,
            'shown_on_table' => $field->shown_on_table,
            'identifier' => $field->identifier,
        ];
    }
}
