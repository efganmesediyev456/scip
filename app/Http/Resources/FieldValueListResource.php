<?php

namespace App\Http\Resources;

use App\Models\FieldValue;
use Illuminate\Http\Resources\Json\JsonResource;

class FieldValueListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var $fieldValue FieldValue */
        $fieldValue = $this->resource;

        return [
            'id' => $fieldValue->id,
            'value' => $fieldValue->id,
            'name' => $fieldValue->value->{app()->getLocale()}
        ];
    }
}
