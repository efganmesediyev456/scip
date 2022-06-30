<?php

namespace App\Http\Resources;

use App\Models\Field;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class FieldListResource extends JsonResource
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

        if ($field->field_group_type == Field::GROUPS['page']) {
            $groupType = array_search($field->field_group_value, Page::TYPES) . ' page template';
        } elseif ($field->field_group_type == Field::GROUPS['post']) {
            $groupType = array_search($field->field_group_value, Post::TYPES) . ' posts';
        } else {
            $groupType = 'unknown';
        }

        return [
            'id' => $field->id,
            'name' => Str::limit($field->name->{app()->getLocale()}, 20),
            'type' => array_search($field->type, Field::TYPES),
            'field_group_type' => $field->field_group_type,
            'group_type' => Str::title($groupType),
            'required' => $field->required ? __('yes') : __('no'),
            'shown_on_table' => $field->shown_on_table ? __('yes') : __('no'),
            'created_at' => $field->created_at->diffForHumans(now()),
        ];
    }
}
