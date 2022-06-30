<?php

namespace App\Http\Controllers;

use App\Http\Resources\PageFieldsResource;
use App\Http\Resources\PageFieldResource;
use App\Http\Resources\PageListResource;
use App\Models\Field;
use App\Models\Page;
use App\Models\PageField;
use App\Models\SearchEngineField;
use App\Rules\TemporaryFile;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PageController extends ApiController
{
    public function index()
    {

        $pages = Page::withoutGlobalScope('published')
            ->withCount('visits')
            ->with('parent')
            ->orderBy($this->orderBy, $this->orderDir);

        if (!blank($this->keywords)) {
            $pages->where(function (Builder $query) {
                $query->orWhereJsonContains('name', $this->keywords);
            });
        }

        if ($this->paginate) {
            $pages = $pages->paginate($this->perPage);
        } else {
            $pages = $pages->get();
        }

        return PageListResource::collection($pages);
    }

    public function fields(int $pageType): ResourceCollection
    {
        $fields = Field::whereFieldGroupType(Field::GROUPS['page'])->whereFieldGroupValue($pageType)->get();

        return PageFieldResource::collection($fields);
    }

    public function store(Request $request, int $pageType): Response
    {
        $request->validate([
            'name' => 'array|min:1',
            'name.*' => 'required|string|max:255',
            'parent_id' => 'required|int|exists:pages,id',
            'shown_in_menu' => 'required|numeric|in:0,1',
            'fields' => 'sometimes|required|array',
            'seo' => 'required|array',
            'seo.title' => 'sometimes|required|array|min:1',
            'seo.title.*' => 'sometimes|required|string|max:255',
            'seo.description' => 'sometimes|required|array|min:1',
            'seo.description.*' => 'sometimes|required|string|max:255',
            'seo.url' => 'sometimes|required|array|min:1',
            'seo.url.*' => 'required|string|max:255',
            'seo.image' => 'sometimes|required|array|min:1',
            'seo.image.*' => ['sometimes', 'required', new TemporaryFile()],
        ]);

        $fields = Field::whereFieldGroupType(Field::GROUPS['page'])->whereFieldGroupValue($pageType)->get();

        $rules = [];
        $attributes = [];

        foreach ($fields as $field) {
            switch ($field->type) {
                case Field::TYPES['string']:
                case Field::TYPES['textarea']:
                case Field::TYPES['editor']:
                {
                    if (!$field->required) {
                        $rules["fields.$field->identifier"][] = 'sometimes';
                    }

                    $rules["fields.$field->identifier"][] = 'required';

                    if ($field->translated) {
                        foreach (config('app.locales') as $locale) {
                            $attributes["fields.$field->identifier.$locale"] = localized($field->name) . ' ' . strtoupper($locale);
                        }

                        $rules["fields.$field->identifier"][] = 'array';
                        $rules["fields.$field->identifier.*"][] = 'string';

                        if ($field->min_length && $field->max_length) {
                            $rules["fields.$field->identifier.*"][] = "min:$field->min_length";
                            $rules["fields.$field->identifier.*"][] = "max:$field->max_length";
                        }
                    } else {
                        $attributes["fields.$field->identifier"] = localized($field->name);

                        $rules["fields.$field->identifier"][] = 'string';

                        if ($field->min_length && $field->max_length) {
                            $rules["fields.$field->identifier"][] = "min:$field->min_length";
                            $rules["fields.$field->identifier"][] = "max:$field->max_length";
                        }
                    }

                    break;
                }
                case Field::TYPES['number']:
                {
                    if (!$field->required) {
                        $rules["fields.$field->identifier"][] = 'sometimes';
                    }

                    $rules["fields.$field->identifier"][] = 'required';

                    $attributes["fields.$field->identifier"] = localized($field->name);

                    $rules["fields.$field->identifier"][] = 'numeric';

                    if ($field->min && $field->max) {
                        $rules["fields.$field->identifier"][] = "min:$field->min";
                        $rules["fields.$field->identifier"][] = "max:$field->max";
                    }

                    break;
                }
                case Field::TYPES['date']:
                {
                    if (!$field->required) {
                        $rules["fields.$field->identifier"][] = 'sometimes';
                    }

                    $rules["fields.$field->identifier"][] = 'required';

                    $attributes["fields.$field->identifier"] = localized($field->name);

                    $rules["fields.$field->identifier"][] = 'date';
                    $rules["fields.$field->identifier"][] = 'date_format:Y-m-d';

                    break;
                }
                case Field::TYPES['url']:
                {
                    if (!$field->required) {
                        $rules["fields.$field->identifier"][] = 'sometimes';
                    }

                    $rules["fields.$field->identifier"][] = 'required';

                    $attributes["fields.$field->identifier"] = localized($field->name);

                    $rules["fields.$field->identifier"][] = 'url';

                    if ($field->min_length && $field->max_length) {
                        $rules["fields.$field->identifier"][] = "min:$field->min_length";
                        $rules["fields.$field->identifier"][] = "max:$field->max_length";
                    }

                    break;
                }
                case Field::TYPES['active_url']:
                {
                    if (!$field->required) {
                        $rules["fields.$field->identifier"][] = 'sometimes';
                    }

                    $rules["fields.$field->identifier"][] = 'required';

                    $attributes["fields.$field->identifier"] = localized($field->name);

                    $rules["fields.$field->identifier"][] = 'active_url';

                    if ($field->min_length && $field->max_length) {
                        $rules["fields.$field->identifier"][] = "min:$field->min_length";
                        $rules["fields.$field->identifier"][] = "max:$field->max_length";
                    }

                    break;
                }
                case Field::TYPES['select']:
                case Field::TYPES['radio']:
                {
                    if (!$field->required) {
                        $rules["fields.$field->identifier"][] = 'sometimes';
                    }

                    $rules["fields.$field->identifier"][] = 'required';

                    $attributes["fields.$field->identifier"] = localized($field->name);

                    $rules["fields.$field->identifier"][] = Rule::in($field->values->pluck('id'));

                    break;
                }
                case Field::TYPES['multiselect']:
                {
                    if (!$field->required) {
                        $rules["fields.$field->identifier"][] = 'sometimes';
                    }

                    $rules["fields.$field->identifier"][] = 'required';

                    $attributes["fields.$field->identifier"] = localized($field->name);
                    $attributes["fields.$field->identifier.*"] = localized($field->name);

                    $rules["fields.$field->identifier.*"][] = 'required';
                    $rules["fields.$field->identifier.*"][] = 'numeric';
                    $rules["fields.$field->identifier.*"][] = Rule::in($field->values->pluck('id'));

                    break;
                }
                case Field::TYPES['file']:
                {
                    if (!$field->required) {
                        $rules["fields.$field->identifier"][] = 'sometimes';
                    }

                    $rules["fields.$field->identifier"][] = 'required';
                    $rules["fields.$field->identifier"][] = 'string';

                    $attributes["fields.$field->identifier"] = localized($field->name);

                    $rules["fields.$field->identifier"][] = new TemporaryFile();

                    break;
                }
                case Field::TYPES['files']:
                {
                    if (!$field->required) {
                        $rules["fields.$field->identifier"][] = 'sometimes';
                    }

                    $rules["fields.$field->identifier"][] = 'required';
                    $rules["fields.$field->identifier"][] = 'array';

                    $attributes["fields.$field->identifier"] = localized($field->name);

                    $rules["fields.$field->identifier.*"][] = new TemporaryFile();

                    break;
                }
            }
        }

        $request->validate($rules, [], $attributes);

        $page = new Page();

        DB::transaction(function () use ($pageType, $request, $page, $fields) {
            $page->type = $pageType;
            $page->name = $request->input('name') ?? [];
            $page->page_id = $request->input('parent_id');
            $page->shown_in_menu = $request->input('shown_in_menu') == 1;
            $page->show_in_burger = $request->input('shown_in_burger') == 1;
            $page->show_in_header = $request->input('shown_in_header') == 1;
            $page->order = $request->input('order') ?? 1;

            $page->slug = collect($request->input('seo')['url'])->map(fn (string $slug) => Str::slug($slug))->toArray();
            $page->save();

            $seo = new SearchEngineField();

            $seo->title = $request->input('seo')['title'] ?? [];
            $seo->description = $request->input('seo')['description'] ?? [];
            $seo->keywords = collect($request->input('seo')['keywords'] ?? [])->map(fn (array $keywords) => implode(',', $keywords))->toArray();

            $page->seo()->save($seo);

            foreach ($request->input('seo')['image'] ?? [] as $locale => $image) {
                $seo->addMediaFromDisk($image, 'temporary')
                    ->withCustomProperties(['locale' => $locale])
                    ->preservingOriginal()
                    ->toMediaCollection('image');
            }

            foreach ($fields as $field) {
                switch ($field->type) {
                    case Field::TYPES['url']:
                    case Field::TYPES['active_url']:
                    case Field::TYPES['string']:
                    case Field::TYPES['textarea']:
                    case Field::TYPES['editor']:
                    case Field::TYPES['number']:
                    {
                        $value = $request->get("fields")[$field->identifier] ?? null;

                        $page->fields()->attach($field->id, [
                            'value' => $field->translated ? json_encode($value) : $value
                        ]);

                        break;
                    }
                    case Field::TYPES['date']:
                    {
                        try {
                            $value = Carbon::parse($request->get("fields")[$field->identifier] ?? null)->format('Y-m-d H:i:s');
                        } catch (\Throwable $e) {
                            $value = null;
                        }

                        $page->fields()->attach($field->id, [
                            'value' => $field->translated ? json_encode($value) : $value
                        ]);

                        break;
                    }
                    case Field::TYPES['select']:
                    case Field::TYPES['radio']:
                    {
                        $page->fields()->attach($field->id, [
                            'field_value_id' => $request->get("fields")[$field->identifier] ?? null
                        ]);

                        break;
                    }
                    case Field::TYPES['multiselect']:
                    {
                        foreach ($request->get("fields")[$field->identifier] ?? [] as $field_value) {
                            $page->fields()->attach($field->id, [
                                'field_value_id' => $field_value
                            ]);
                        }

                        break;
                    }
                    case Field::TYPES['file']:
                    {
                        $fieldPostId = PageField::insertGetId([
                            'page_id' => $page->id,
                            'field_id' => $field->id
                        ]);

                        if (array_key_exists($field->identifier, $request->get('fields'))) {
                            PageField::findOrFail($fieldPostId)
                                ->addMediaFromDisk($request->get("fields")[$field->identifier], 'temporary')
                                ->withCustomProperties(['field-identifier' => $field->identifier])
                                ->preservingOriginal()->toMediaCollection('file');
                        }

                        break;
                    }
                    case Field::TYPES['files']:
                    {
                        $fieldPostId = PageField::insertGetId([
                            'page_id' => $page->id,
                            'field_id' => $field->id
                        ]);

                        foreach ($request->get("fields")[$field->identifier] ?? [] as $file) {
                            PageField::findOrFail($fieldPostId)->addMediaFromDisk($file, 'temporary')
                                ->withCustomProperties([
                                    // todo: is this required?
                                    'field-identifier' => $field->identifier
                                ])->preservingOriginal()->toMediaCollection('file');
                        }

                        break;
                    }
                }
            }
        });

        Cache::forget('mainPage');

        return response(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        $page = Page::withoutGlobalScope('published')->findOrFail($id);

        /** @var $seo SearchEngineField */
        $seo = $page->seo;

        return response([
            'fields' => new PageFieldsResource($page),
            'name' => $page->name,
            'type' => $page->type,
            'parent_id' => $page->page_id,
            'shown_in_menu' => $page->shown_in_menu,
            'shown_in_burger' => $page->show_in_burger,
            'shown_in_header' => $page->show_in_header,
            'order' => $page->order,
            'seo' => [
                'title' => $seo->title,
                'description' => $seo->description,
                'keywords' => $seo->keywords,
                'url' => $page->slug,
                'image' => localed([]),
            ]
        ]);
    }

    public function update(Request $request, int $pageId): Response
    {
        $page = Page::withoutGlobalScope('published')->findOrFail($pageId);

        $request->validate([
            'name' => 'array|min:1',
            'name.*' => 'required|string|max:255',
            'parent_id' => 'nullable|int|exists:pages,id',
            'shown_in_menu' => 'required|numeric|in:0,1',
            'fields' => 'array',
            'seo' => 'required|array|min:1',
            'seo.title' => 'array|min:1',
            'seo.title.*' => 'sometimes|required|string|max:255',
            'seo.description' => 'array|min:1',
            'seo.description.*' => 'sometimes|required|string|max:255',
            'seo.url' => 'array|min:1',
            'seo.url.*' => 'required|string|max:255',
            'seo.image' => 'array|min:1',
            'seo.image.*' => ['sometimes', 'required', new TemporaryFile()],
        ]);

        $fields = Field::whereFieldGroupType(Field::GROUPS['page'])->whereFieldGroupValue($page->type)->get();

        $rules = [];
        $attributes = [];

        foreach ($fields as $field) {
            switch ($field->type) {
                case Field::TYPES['string']:
                case Field::TYPES['textarea']:
                case Field::TYPES['editor']:
                {
                    if (!$field->required) {
                        $rules["fields.$field->identifier"][] = 'sometimes';
                    }

                    $rules["fields.$field->identifier"][] = 'required';

                    if ($field->translated) {
                        foreach (config('app.locales') as $locale) {
                            $attributes["fields.$field->identifier.$locale"] = localized($field->name) . ' ' . strtoupper($locale);
                        }

                        $rules["fields.$field->identifier"][] = 'array';
                        $rules["fields.$field->identifier.*"][] = 'string';

                        if ($field->min_length && $field->max_length) {
                            $rules["fields.$field->identifier.*"][] = "min:$field->min_length";
                            $rules["fields.$field->identifier.*"][] = "max:$field->max_length";
                        }
                    } else {
                        $attributes["fields.$field->identifier"] = localized($field->name);

                        $rules["fields.$field->identifier"][] = 'string';

                        if ($field->min_length && $field->max_length) {
                            $rules["fields.$field->identifier"][] = "min:$field->min_length";
                            $rules["fields.$field->identifier"][] = "max:$field->max_length";
                        }
                    }

                    break;
                }
                case Field::TYPES['number']:
                {
                    if (!$field->required) {
                        $rules["fields.$field->identifier"][] = 'sometimes';
                    }

                    $rules["fields.$field->identifier"][] = 'required';

                    $attributes["fields.$field->identifier"] = localized($field->name);

                    $rules["fields.$field->identifier"][] = 'numeric';

                    if ($field->min && $field->max) {
                        $rules["fields.$field->identifier"][] = "min:$field->min";
                        $rules["fields.$field->identifier"][] = "max:$field->max";
                    }

                    break;
                }
                case Field::TYPES['date']:
                {
                    if (!$field->required) {
                        $rules["fields.$field->identifier"][] = 'sometimes';
                    }

                    $rules["fields.$field->identifier"][] = 'required';

                    $attributes["fields.$field->identifier"] = localized($field->name);

                    $rules["fields.$field->identifier"][] = 'date';
                    $rules["fields.$field->identifier"][] = 'date_format:Y-m-d';

                    break;
                }
                case Field::TYPES['url']:
                {
                    if (!$field->required) {
                        $rules["fields.$field->identifier"][] = 'sometimes';
                    }

                    $rules["fields.$field->identifier"][] = 'required';

                    $attributes["fields.$field->identifier"] = localized($field->name);

                    $rules["fields.$field->identifier"][] = 'url';

                    if ($field->min_length && $field->max_length) {
                        $rules["fields.$field->identifier"][] = "min:$field->min_length";
                        $rules["fields.$field->identifier"][] = "max:$field->max_length";
                    }

                    break;
                }
                case Field::TYPES['active_url']:
                {
                    if (!$field->required) {
                        $rules["fields.$field->identifier"][] = 'sometimes';
                    }

                    $rules["fields.$field->identifier"][] = 'required';

                    $attributes["fields.$field->identifier"] = localized($field->name);

                    $rules["fields.$field->identifier"][] = 'active_url';

                    if ($field->min_length && $field->max_length) {
                        $rules["fields.$field->identifier"][] = "min:$field->min_length";
                        $rules["fields.$field->identifier"][] = "max:$field->max_length";
                    }

                    break;
                }
                case Field::TYPES['select']:
                case Field::TYPES['radio']:
                {
                    if (!$field->required) {
                        $rules["fields.$field->identifier"][] = 'sometimes';
                    }

                    $rules["fields.$field->identifier"][] = 'required';

                    $attributes["fields.$field->identifier"] = localized($field->name);

                    $rules["fields.$field->identifier"][] = Rule::in($field->values->pluck('id'));

                    break;
                }
                case Field::TYPES['multiselect']:
                {
                    if (!$field->required) {
                        $rules["fields.$field->identifier"][] = 'sometimes';
                    }

                    $rules["fields.$field->identifier"][] = 'required';

                    $attributes["fields.$field->identifier"] = localized($field->name);
                    $attributes["fields.$field->identifier.*"] = localized($field->name);

                    $rules["fields.$field->identifier.*"][] = 'required';
                    $rules["fields.$field->identifier.*"][] = 'numeric';
                    $rules["fields.$field->identifier.*"][] = Rule::in($field->values->pluck('id'));

                    break;
                }
                case Field::TYPES['file']:
                {
                    if (!$field->required) {
                        $rules["fields.$field->identifier"][] = 'sometimes';
                    }

                    $rules["fields.$field->identifier"][] = 'required';
                    $rules["fields.$field->identifier"][] = 'string';

                    $attributes["fields.$field->identifier"] = localized($field->name);

                    $rules["fields.$field->identifier"][] = new TemporaryFile();

                    break;
                }
                case Field::TYPES['files']:
                {
                    if (!$field->required) {
                        $rules["fields.$field->identifier"][] = 'sometimes';
                    }

                    $rules["fields.$field->identifier"][] = 'required';
                    $rules["fields.$field->identifier"][] = 'array';

                    $attributes["fields.$field->identifier"] = localized($field->name);

                    $rules["fields.$field->identifier.*"][] = new TemporaryFile();

                    break;
                }
            }
        }

        $request->validate($rules, [], $attributes);

        DB::transaction(function () use ($request, $page, $fields) {
            $page->name = $request->input('name') ?? [];
            $page->page_id = $request->input('parent_id');
            $page->shown_in_menu = $request->input('shown_in_menu') == 1;
            $page->show_in_burger = $request->input('shown_in_burger') == 1;
            $page->show_in_header = $request->input('shown_in_header') == 1;
            $page->order = $request->input('order') ?? 1;

            $page->slug = collect($request->input('seo')['url'] ?? [])->map(fn (string $slug) => Str::slug($slug))->toArray();

            $page->save();

            $seo = $page->seo;

            $seo->title = $request->input('seo')['title'] ?? [];
            $seo->description = $request->input('seo')['description'] ?? [];
            $seo->keywords = collect($request->input('seo')['keywords'] ?? [])->map(fn (array $keywords) => implode(',', $keywords))->toArray();

            $seo->save();

            foreach ($request->input('seo')['image'] ?? [] as $locale => $image) {
                if ($seo->hasMedia('image', ['locale' => $locale])) {
                    $seo->getFirstMedia('image', ['locale' => $locale])->delete();
                }

                $seo->addMediaFromDisk($image, 'temporary')
                    ->withCustomProperties(['locale' => $locale])
                    ->preservingOriginal()
                    ->toMediaCollection('image');
            }

            foreach ($fields as $field) {
                switch ($field->type) {
                    case Field::TYPES['url']:
                    case Field::TYPES['active_url']:
                    case Field::TYPES['string']:
                    case Field::TYPES['textarea']:
                    case Field::TYPES['editor']:
                    case Field::TYPES['number']:
                    {
                        $value = $request->get("fields")[$field->identifier] ?? null;

                        $page->fields()->detach($field->id);
                        $page->fields()->attach($field->id, [
                            'value' => $field->translated ? json_encode($value) : $value
                        ]);

                        break;
                    }
                    case Field::TYPES['date']:
                    {
                        try {
                            $value = Carbon::parse($request->get("fields")[$field->identifier] ?? null)->format('Y-m-d H:i:s');
                        } catch (\Throwable $e) {
                            $value = null;
                        }

                        $page->fields()->detach($field->id);
                        $page->fields()->attach($field->id, [
                            'value' => $field->translated ? json_encode($value) : $value
                        ]);

                        break;
                    }
                    case Field::TYPES['select']:
                    case Field::TYPES['radio']:
                    {
                        $page->fields()->detach($field->id);
                        $page->fields()->attach($field->id, [
                            'field_value_id' => $request->get("fields")[$field->identifier] ?? null
                        ]);

                        break;
                    }
                    case Field::TYPES['multiselect']:
                    {
                        $page->fields()->detach($field->id);
                        foreach ($request->get("fields")[$field->identifier] ?? [] as $field_value) {
                            $page->fields()->attach($field->id, [
                                'field_value_id' => $field_value
                            ]);
                        }

                        break;
                    }
                    case Field::TYPES['file']:
                    {
                        if ($page->fields->find($field->id)?->pivot->hasMedia('file', ['field-identifier' => $field->identifier])) {
                            $page->fields->find($field->id)->pivot->getMedia('file', ['field-identifier' => $field->identifier])->first()->delete();
                        }

                        $fieldPostId = PageField::insertGetId([
                            'page_id' => $page->id,
                            'field_id' => $field->id
                        ]);

                        if (array_key_exists($field->identifier, $request->get('fields'))) {
                            PageField::findOrFail($fieldPostId)
                                ->addMediaFromDisk($request->get("fields")[$field->identifier], 'temporary')
                                ->withCustomProperties(['field-identifier' => $field->identifier])
                                ->preservingOriginal()->toMediaCollection('file');
                        }

                        break;
                    }
                    case Field::TYPES['files']:
                    {
                        if (count($request->get('fields')[$field->identifier] ?? []) == 0) {
                            break;
                        }

                        if ($page->fields->find($field->id)?->pivot->hasMedia('file', ['field-identifier' => $field->identifier])) {
                            $page->fields->find($field->id)->pivot->getMedia('file', ['field-identifier' => $field->identifier])->delete();
                        }

                        $fieldPostId = PageField::insertGetId([
                            'page_id' => $page->id,
                            'field_id' => $field->id
                        ]);

                        foreach ($request->get("fields")[$field->identifier] ?? [] as $file) {
                            PageField::findOrFail($fieldPostId)->addMediaFromDisk($file, 'temporary')
                                ->withCustomProperties([
                                    // todo: is this required?
                                    'field-identifier' => $field->identifier
                                ])->preservingOriginal()->toMediaCollection('file');
                        }

                        break;
                    }
                }
            }
        });

        Cache::forget('mainPage');

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function publish(int $pageId): Response
    {
        $page = Page::withoutGlobalScope('published')->findOrFail($pageId);

        $page->published = true;

        $page->save();

        Cache::forget('mainPage');

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function hide(int $pageId): Response
    {
        $page = Page::findOrFail($pageId);

        $page->published = false;

        $page->save();

        Cache::forget('mainPage');

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
