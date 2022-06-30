<?php

namespace App\Http\Resources;

use App\Models\Settings;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingsEditResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var $settings Settings */
        $settings = $this->resource;

        $value = match ($settings->type) {
            Settings::TYPES['image'] => localed([]),
            default => $settings->value
        };

        return [
            'type' => $settings->type,
            'value' => $value
        ];
    }
}
