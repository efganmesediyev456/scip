<?php

namespace App\Http\Resources;

use App\Models\Field;
use App\Models\Post;
use App\Models\PostField;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class AgriculturalProjectResource extends JsonResource
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
            'address'=>$field->address,
            'mobile'=>$field->mobile,
            'email'=>$field->email,
            'project'=>$field->project,
            'district'=>$field->district,
            'sown_area'=>$field->sown_area,
            'processing_area'=>$field->processing_area,
            'product'=>$field->product,
            'date'=>$field->date,
            'irrigation_method'=>$field->irrigation_method,
        ];
    }
}
