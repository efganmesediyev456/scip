<?php

namespace App\Http\Resources;

use App\Models\Field;
use App\Models\Post;
use App\Models\PostField;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class IndustrialProjectResource extends JsonResource
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
            'id'=>$field->id,
            'full_name'=>$field->full_name,
            'voen'=>$field->full_name,
            'project'=>$field->project,
            'material'=>$field->material,
            'production'=>$field->production,
            'time'=>$field->time,
            'demand'=>$field->demand,
            'productive_capacity'=>$field->productive_capacity,
            'investisiya'=>$field->investisiya,
            'area'=>$field->area,
            'sales'=>$field->sales,
            'area_electric'=>$field->area_electric,
            'natural_gas'=>$field->natural_gas,
            'technical_water'=>$field->technical_water,
            'drinkable_water'=>$field->drinkable_water,
            'infrastructure_requirements'=>$field->infrastructure_requirements,
        ];
    }
}
