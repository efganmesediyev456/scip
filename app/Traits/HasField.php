<?php

namespace App\Traits;

use App\Models\Field;
use Carbon\Carbon;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait HasField
{
    public function getValue(Field $field, bool $translate = false, bool $ids = false)
    {
        switch ($field->type) {
            case Field::TYPES['string']:
            case Field::TYPES['textarea']:
            case Field::TYPES['editor']:
            {
                if ($field->canBeTranslated() && $field->translated) {
                    $translations = json_decode($this->value);

                    if (!$translations) {
                        $translation = new \stdClass();

                        foreach (config('app.locales') as $locale) {
                            $translation->$locale = '';
                        }

                        return $translation;
                    }

                    if (empty($translations->{app()->getLocale()})) {
                        $translations->{app()->getLocale()} = '';
                    }

                    if ($translate) {
                        return $translations->{app()->getLocale()};
                    }

                    return $translations;
                }

                return $this->value;
            }
            case Field::TYPES['number']:
            case Field::TYPES['url']:
            case Field::TYPES['active_url']:
            {
                return $this->value;
            }
            case Field::TYPES['date']:
            {
                if (blank($this->value)) {
                    return null;
                }

                return Carbon::parse($this->value)->format('Y-m-d');
            }
            case Field::TYPES['radio']:
            case Field::TYPES['select']:
            case Field::TYPES['multiselect']:
            {
                if ($ids) {
                    return $field->values->where('id', $this->field_value_id)->first()->id;
                } else {
                    $value = $field->values->where('id', $this->field_value_id)->first()->value;

                    if ($translate) {
                        return localized($value);
                    }
                }

                return $value;
            }
            case Field::TYPES['file']:
            {
//                return $this->getMedia('file')->map(function (Media $media) {
//                    return [
//                        'key' => $media->getCustomProperty('locale'),
//                        'url' => $media->getFullUrl()
//                    ];
//                })->pluck('url', 'key')->first();
                return localed([]);
            }
            case Field::TYPES['files']:
            {
                return $this->getMedia('file')->map(function (Media $media) {
                    return $media->getFullUrl();
                })->pluck('url', 'key');
            }
            default:
                return null;
        }
    }
}
