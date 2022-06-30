<?php

namespace App\Http\Resources;

use App\Models\Field;
use App\Models\Page;
use App\Models\PageField;
use App\Models\Post;
use App\Models\PostField;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class PageFieldsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var $page Page */
        $page = $this->resource;

        $data = [];

        $fields = Field::whereFieldGroupType(Field::GROUPS['page'])
            ->whereFieldGroupValue($page->type)
            ->get();

        foreach ($fields as $field) {
            if ($field->hasMultipleValues()) {
                $data[$field->identifier] = $page->getField($field)?->map(function (PageField $postField) use ($field) {
                    return $postField->getValue($field, ids: true);
                });
            } else {
                $data[$field->identifier] = $page->getField($field)?->getValue($field, ids: true);
            }
        }

        return $data;
    }
}
