<?php

namespace App\Http\Resources;

use App\Models\Settings;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingsListResource extends JsonResource
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
            Settings::TYPES['image'] => '<a target="_blank" href="'.$settings->getFirstMedia('image', ['locale' => app()->getLocale()])?->getFullUrl().'"><i class="bi bi-cloud-arrow-down fs-3"></i></a>',
            default => localized($settings->value)
        };

        return [
            'id' => $settings->id,
            'key' => $settings->key,
            'value' => $value
        ];
    }
}
