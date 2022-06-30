<?php

namespace App\Http\Resources;

use App\Models\Field;
use App\Models\Post;
use App\Models\PostField;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class PostListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var $post Post */
        $post = $this->resource;

        $data = [
            'id' => $post->id
        ];

        foreach (session('columns') as $field) {
            /** @var $field Field */
            if ($field->hasMultipleValues()) {
                $data[$field->identifier] = Str::limit($post->getField($field)?->map(function (PostField $postField) use ($field) {
                    return ['value' => $postField->getValue($field, true)];
                })->implode('value', ','), 30);
            } else {
                $data[$field->identifier] = Str::limit($post->getField($field)?->getValue($field, true), 30);
            }
        }

        $data['visits'] = $post->visits_count;

        return $data;
    }
}
