<?php

namespace App\Http\Resources;

use App\Models\Page;
use Illuminate\Http\Resources\Json\JsonResource;

class PageListResource extends JsonResource
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

        $name = $page->name->{app()->getLocale()};

//        $hiddenPageTip = '<i class="bi bi-exclamation-triangle-fill text-warning me-2"></i>';
        $hiddenPageTip = '';

        return [
            'id' => $page->id,
            'name' => !$page->published ? $hiddenPageTip . $name : $name,
            'type' => array_search($page->type, Page::TYPES),
            'type_id' => $page->type,
            'order' => $page->order,
            'parent' => $page->parent?->name->{app()->getLocale()},
            'shown_in_menu' => $page->shown_in_menu ? __('yes') : __('no'),
            'shown_in_burger' => $page->shown_in_burger ? __('yes') : __('no'),
            'shown_in_header' => $page->shown_in_header ? __('yes') : __('no'),
            'visits' => $page->visits_count,
            'published' => $page->published,

        ];
    }
}
