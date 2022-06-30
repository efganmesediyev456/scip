<?php

namespace App\Http\Controllers;

use App\Http\Resources\SettingsEditResource;
use App\Http\Resources\SettingsListResource;
use App\Models\Settings;
use App\Rules\TemporaryFile;
use Hamcrest\Core\Set;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class SettingsController extends ApiController
{
    public function index(): ResourceCollection
    {
        $settings = Settings::with('media')->orderBy($this->orderBy, $this->orderDir);

        if (!blank($this->keywords)) {
            $settings->where(function (Builder $query) {
                $query->where('key', 'ilike', '%' . $this->keywords . '%');
                $query->orWhereJsonContains('value', $this->keywords);
            });
        }

        if ($this->paginate) {
            $settings = $settings->paginate($this->perPage);
        } else {
            $settings = $settings->get();
        }

        return SettingsListResource::collection($settings);
    }

    public function show(int $id): SettingsEditResource
    {
        $settings = Settings::findOrFail($id);

        return new SettingsEditResource($settings);
    }

    public function update(int $id, Request $request): Response
    {
        $settings = Settings::findOrFail($id);

        $rules = [
            'value' => ['required'],
        ];

        switch ($settings->type) {
            case Settings::TYPES['image']:
            {
                $rules['value'][] = 'array';
                $rules['value'][] = 'min:1';
                $rules['value.*'][] = 'required';
                $rules['value.*'][] = new TemporaryFile();
                break;
            }
            case Settings::TYPES['string']:
            {
                $rules['value'][] = 'array';
                $rules['value.*'][] = 'required';
                $rules['value.*'][] = 'string';
                $rules['value.*'][] = 'max:500';
                break;
            }
            case Settings::TYPES['url']:
            {
                $rules['value'][] = 'array';
                $rules['value.*'][] = 'required';
                $rules['value.*'][] = 'active_url';
                $rules['value.*'][] = 'max:500';
                break;
            }
            case Settings::TYPES['text']:
            {
                $rules['value'][] = 'array';
                $rules['value.*'][] = 'required';
                $rules['value.*'][] = 'string';
                $rules['value.*'][] = 'max:70000';
                break;
            }
            case Settings::TYPES['bool']:
            {
                $rules['value'][] = 'array';
                $rules['value.*'][] = 'required';
                $rules['value.*'][] = 'boolean';
                break;
            }
            default:
            {
                abort(Response::HTTP_NOT_ACCEPTABLE);
            }
        }

        $request->validate($rules);

        $value = $request->input('value');

        switch ($settings->type) {
            case Settings::TYPES['image']:
            {
                foreach ($request->input('value') as $locale => $file) {
                    $oldImage = $settings->getMedia('image', ['locale' => $locale])->first();

                    if ($oldImage) {
                        $oldImage->delete();
                    }

                    $settings->addMediaFromDisk($file, 'temporary')->withCustomProperties(['locale' => $locale])
                        ->toMediaCollection("image");
                }

                break;
            }
            case Settings::TYPES['bool']:
            {
                $settings->value = $value;
                break;
            }
            case Settings::TYPES['url']:
            case Settings::TYPES['text']:
            case Settings::TYPES['string']:
            {
                $settings->value = collect($value)->map(fn ($value) => preg_replace(['#<script(.*?)>(.*?)</script>#is', '/\bon\w+=\S+(?=.*>)/'], '', $value));
                break;
            }
            default:
            {
                abort(Response::HTTP_NOT_ACCEPTABLE);
            }
        }

        $settings->save();

        Cache::forget('settings');

        Cache::rememberForever('settings', function () {
            return Settings::with('media')->latest()->get();
        });

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
