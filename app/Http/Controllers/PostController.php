<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostColumnResource;
use App\Http\Resources\PostFieldResource;
use App\Http\Resources\PostListResource;
use App\Http\Resources\PostFieldsResource;
use App\Models\Field;
use App\Models\Page;
use App\Models\Post;
use App\Models\PostField;
use App\Models\SearchEngineField;
use App\Rules\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use function Symfony\Component\Console\Helper\render;
use Throwable;

class PostController extends ApiController
{
    public $pga=0;
    public function fields(int $postType): ResourceCollection
    {
        $fields = Field::whereFieldGroupType(Field::GROUPS['post'])->whereFieldGroupValue($postType)->get();

        return PostFieldResource::collection($fields);
    }

    /**
     * Display a listing of the resource.
     *
     * @param int $postType
     * @return Response
     */
    public function index(Request $request, int $postType): ResourceCollection
    {
        $fields = Field::whereFieldGroupType(Field::GROUPS['post'])
            ->whereFieldGroupValue($postType)
            ->whereShownOnTable(true)
            ->get();

        $posts = Post::whereType($postType)->withCount('visits')->orderBy($this->orderBy, $this->orderDir);

        if ($request->has('page_id')) {
            $posts->wherePageId($request->query('page_id'));
        }

        if ($this->paginate) {
            $posts = $posts->paginate($this->perPage);
        } else {
            $posts = $posts->get();
        }

        session()->flash('columns', $fields);

        return PostListResource::collection($posts);
    }

    public function columns(int $postType): ResourceCollection
    {
        $fields = Field::whereFieldGroupType(Field::GROUPS['post'])
            ->whereFieldGroupValue($postType)
            ->whereShownOnTable(true)
            ->get();

        return PostColumnResource::collection($fields);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws Throwable
     */
    public function store(Request $request, int $postType)
    {
        $rules = [];

        if (!Post::isShownOnPageOnly($postType)) {
            $rules = [
                'seo' => 'required|array',
                'seo.title' => 'array|min:1',
                'seo.title.*' => 'sometimes|required|string|max:255',
                'seo.description' => 'array|min:1',
                'seo.description.*' => 'sometimes|required|string|max:255',
                'seo.url' => 'array|min:1',
                'seo.url.*' => 'required|string|max:255',
                'seo.image' => 'array|min:1',
                'seo.image.*' => ['sometimes', 'required', new TemporaryFile()],
            ];
        } else {
            $rules['page_id'] = 'required|exists:pages,id';
        }




        $rules['fields'] = 'required|array';

        $request->validate($rules);

        $fields = Field::whereFieldGroupType(Field::GROUPS['post'])->whereFieldGroupValue($postType)->get();


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

        $post = new Post();

        DB::transaction(function () use ($postType, $request, $post, $fields) {
            $post->type = $postType;

            if (!Post::isShownOnPageOnly($postType)) {
                $post->slug = collect($request->input('seo')['url'])->map(fn (string $slug) => Str::slug($slug))->toArray();
                $post->save();

                $seo = new SearchEngineField();

                $seo->title = $request->input('seo')['title'] ?? [];
                $seo->description = $request->input('seo')['description'] ?? [];
                $seo->keywords = collect($request->input('seo')['keywords'] ?? [])->map(fn (array $keywords) => implode(',', $keywords))->toArray();

                $post->seo()->save($seo);

                foreach ($request->input('seo')['image'] ?? [] as $locale => $image) {
                    $seo->addMediaFromDisk($image, 'temporary')
                        ->withCustomProperties(['locale' => $locale])
                        ->preservingOriginal()
                        ->toMediaCollection('image');
                }
            } else {
                $page = Page::findOrFail($request->input('page_id'));
                $post->page_id = $page->id;
                $post->slug = [];
                $post->save();
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

                        $post->fields()->attach($field->id, [
                            'value' => $field->translated ? json_encode($value) : $value
                        ]);

                        break;
                    }
                    case Field::TYPES['date']:
                    {
                        try {
                            $value = Carbon::parse($request->get("fields")[$field->identifier] ?? null)->format('Y-m-d H:i:s');
                        } catch (Throwable $e) {
                            $value = null;
                        }

                        $post->fields()->attach($field->id, [
                            'value' => $field->translated ? json_encode($value) : $value
                        ]);

                        break;
                    }
                    case Field::TYPES['select']:
                    case Field::TYPES['radio']:
                    {
                        $post->fields()->attach($field->id, [
                            'field_value_id' => $request->get("fields")[$field->identifier] ?? null
                        ]);

                        break;
                    }
                    case Field::TYPES['multiselect']:
                    {
                        foreach ($request->get("fields")[$field->identifier] ?? [] as $field_value) {
                            $post->fields()->attach($field->id, [
                                'field_value_id' => $field_value
                            ]);
                        }

                        break;
                    }
                    case Field::TYPES['file']:
                    {
                        $fieldPostId = PostField::insertGetId([
                            'post_id' => $post->id,
                            'field_id' => $field->id
                        ]);

                        if (array_key_exists($field->identifier, $request->get('fields'))) {
                            PostField::findOrFail($fieldPostId)
                                ->addMediaFromDisk($request->get("fields")[$field->identifier], 'temporary')
                                ->withCustomProperties(['field-identifier' => $field->identifier])
                                ->preservingOriginal()->toMediaCollection('file');
                        }

                        break;
                    }
                    case Field::TYPES['files']:
                    {
                        $fieldPostId = PostField::insertGetId([
                            'post_id' => $post->id,
                            'field_id' => $field->id
                        ]);

                        foreach ($request->get("fields")[$field->identifier] ?? [] as $file) {
                            PostField::findOrFail($fieldPostId)->addMediaFromDisk($file, 'temporary')
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

        Cache::forget("$postType-posts");
        Cache::rememberForever("$postType-posts", fn () => Post::whereType($postType)->get());

        if (Post::isShownOnPageOnly($post->type)) {
            Cache::forget('mainPage');
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id)
    {
        $post = Post::findOrFail($id);




        /** @var $seo SearchEngineField */
        $seo = $post->seo;

        return response([
            'fields' => new PostFieldsResource($post),
            'seo' => [
                'title' => $seo?->title,
                'description' => $seo?->description,
                'keywords' => $seo?->keywords,
                'url' => $post?->slug,
                'image' => localed([]),
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     * @throws Throwable
     */
    public function update(Request $request, int $id)
    {
        $post = Post::findOrFail($id);

        $rules = [];

        if (!Post::isShownOnPageOnly($post->type)) {
            $rules = [
                'seo' => 'required|array',
                'seo.title' => 'array|min:1',
                'seo.title.*' => 'sometimes|required|string|max:255',
                'seo.description' => 'array|min:1',
                'seo.description.*' => 'sometimes|required|string|max:255',
                'seo.url' => 'array|min:1',
                'seo.url.*' => 'required|string|max:255',
                'seo.image' => 'array|min:1',
                'seo.image.*' => ['sometimes', 'required', new TemporaryFile()],
            ];
        } else {
            $rules['page_id'] = 'required|exists:pages,id';
        }

        $rules['fields'] = 'required|array';

        $request->validate($rules);

        $fields = Field::whereFieldGroupType(Field::GROUPS['post'])->whereFieldGroupValue($post->type)->get();

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
                    $rules["fields.$field->identifier"][] = 'sometimes';
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

        DB::transaction(function () use ($request, $post, $fields) {
            if (!Post::isShownOnPageOnly($post->type)) {
                $post->slug = collect($request->input('seo')['url'])->map(fn (string $slug) => Str::slug($slug))->toArray();
                $post->save();

                /** @var $seo SearchEngineField */
                $seo = $post->seo;

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
            } else {
                $page = Page::findOrFail($request->input('page_id'));
                $post->page_id = $page->id;
                $post->slug = [];
                $post->save();
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

                        $post->fields()->detach($field->id);
                        $post->fields()->attach($field->id, [
                            'value' => $field->translated ? json_encode($value) : $value
                        ]);

                        break;
                    }
                    case Field::TYPES['date']:
                    {
                        try {
                            $value = Carbon::parse($request->get("fields")[$field->identifier] ?? null)->format('Y-m-d H:i:s');
                        } catch (Throwable $e) {
                            $value = null;
                        }

                        $post->fields()->detach($field->id);
                        $post->fields()->attach($field->id, [
                            'value' => $field->translated ? json_encode($value) : $value
                        ]);

                        break;
                    }
                    case Field::TYPES['select']:
                    case Field::TYPES['radio']:
                    {
                        $post->fields()->detach($field->id);
                        $post->fields()->attach($field->id, [
                            'field_value_id' => $request->get("fields")[$field->identifier] ?? null
                        ]);

                        break;
                    }
                    case Field::TYPES['multiselect']:
                    {
                        $post->fields()->detach($field->id);
                        foreach ($request->get("fields")[$field->identifier] ?? [] as $field_value) {
                            $post->fields()->attach($field->id, [
                                'field_value_id' => $field_value
                            ]);
                        }

                        break;
                    }
                    case Field::TYPES['file']:
                    {
                        if (!array_key_exists($field->identifier, $request->get('fields'))) {
                            break;
                        }

                        if ($post->fields->find($field->id)?->pivot->hasMedia('file', ['field-identifier' => $field->identifier])) {
                            $post->fields->find($field->id)->pivot->getMedia('file', ['field-identifier' => $field->identifier])->first()->delete();
                        }

                        $post->fields()->detach($field->id);

                        $fieldPostId = PostField::insertGetId([
                            'post_id' => $post->id,
                            'field_id' => $field->id
                        ]);

                        if (array_key_exists($field->identifier, $request->get('fields'))) {
                            PostField::findOrFail($fieldPostId)
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

                        if ($post->fields->find($field->id)?->pivot->hasMedia('file', ['field-identifier' => $field->identifier])) {


                            foreach($post->fields->find($field->id)->pivot->getMedia('file', ['field-identifier' => $field->identifier]) as $media){
                                $media->delete();
                            }
                        }

                        $post->fields()->detach($field->id);

                        $fieldPostId = PostField::insertGetId([
                            'post_id' => $post->id,
                            'field_id' => $field->id
                        ]);

                        foreach ($request->get("fields")[$field->identifier] ?? [] as $file) {
                            PostField::findOrFail($fieldPostId)->addMediaFromDisk($file, 'temporary')
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

        Cache::forget("$post->type-posts");
        Cache::rememberForever("$post->type-posts", fn () => Post::whereType($post->type)->get());

        if (Post::isShownOnPageOnly($post->type)) {
            Cache::forget('mainPage');
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id)
    {
        $post = Post::findOrFail($id);

        if (!Post::isShownOnPageOnly($post->type)) {
            // todo: implement page posts
        }

        $post->fields()->detach();

        $post->delete();

        Cache::forget("$post->type-posts");
        Cache::rememberForever("$post->type-posts", fn () => Post::whereType($post->type)->get());

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function more(Request $request){



        $language=$request->language;

        $posts=posts(1)->get()->skip($request->id)->take(2);





        return \response()->json(['view'=>view('render.news',compact('posts','language'))->render()]);

    }
    public function moreVideo(Request $request){


        $language=$request->language;


        $posts=posts(9)->get()->skip($request->id)->take(2);






        return \response()->json(['view'=>view('render.videogallery',compact('language','posts'))->render()]);

    }

    public function morePhoto(Request $request){


        $language=$request->language;



        $posts=posts(8)->get()->skip($request->id)->take(2);






        return \response()->json(['view'=>view('render.photogallery',compact('language','posts'))->render()]);

    }
    public function moreLogistics(Request $request){

        $page=Page::find($request->page);


        $posts=$page->posts->where('type',\App\Models\Post::TYPES['logistic']);




        $posts=$posts->skip($request->id)->take(2);






        return \response()->json(['view'=>view('render.logistic',compact('posts'))->render()]);

    }
}
