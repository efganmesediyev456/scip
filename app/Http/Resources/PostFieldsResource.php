<?php

namespace App\Http\Resources;

use App\Models\Field;
use App\Models\Post;
use App\Models\PostField;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class PostFieldsResource extends JsonResource
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



        $data = [];

        $fields = Field::whereFieldGroupType(Field::GROUPS['post'])
            ->whereFieldGroupValue($post->type)
            ->get();



        foreach ($fields as $field) {
            if ($field->hasMultipleValues()) {
                $data[$field->identifier] = $post->getField($field)?->map(function (PostField $postField) use ($field) {
                    return $postField->getValue($field, ids: true);
                });
            } else {


                $data[$field->identifier] = $post->getField($field)?->getValue($field, ids: true);

            }
        }



        return $data;
    }
}
