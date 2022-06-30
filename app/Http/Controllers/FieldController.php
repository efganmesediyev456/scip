<?php

namespace App\Http\Controllers;

use App\Http\Resources\FieldEditResource;
use App\Http\Resources\FieldListResource;
use App\Models\Field;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class FieldController extends ApiController
{
    public function index(Request $request): ResourceCollection
    {
        $request->validate([
            'type' => ['sometimes', 'required', Rule::in(Field::TYPES)]
        ]);

        $fields = Field::orderBy($this->orderBy, $this->orderDir);

        if (!blank($this->keywords)) {
            $fields->where(function (Builder $query) {
                $query->where('identifier', 'ilike', '%' . $this->keywords . '%');
                $query->orWhereJsonContains('name', $this->keywords);
                $query->orWhereJsonContains('placeholder', $this->keywords);
            });
        }

        if ($request->has('type')) {
            $fields->whereType($request->query('type'));
        }

        if ($this->paginate) {
            $fields = $fields->paginate($this->perPage);
        } else {
            $fields = $fields->get();
        }

        return FieldListResource::collection($fields);
    }

    public function store(Request $request): Response
    {
        $request->validate([
            'type' => ['required', Rule::in(Field::TYPES)],
            'group_type' => ['required', Rule::in(Field::GROUPS)],
            'group_value' => ['required', Rule::in(array_unique(array_merge(Page::TYPES, Post::TYPES)))],
            'name' => 'required|array',
            'name.*' => 'required|string|max:255',
            'placeholder' => 'required|array',
            'placeholder.*' => 'required|string|max:255',
            'required' => 'required|boolean',
            'shown_on_table' => 'required|boolean',
            'translated' => 'sometimes|required|in:0,1',
            'identifier' => ['required', 'string', 'alpha_dash', Rule::unique('fields')
                ->where('field_group_type', $request->input('group_type'))
                ->where('field_group_value', $request->input('group_value'))
            ]
        ]);

        $field = new Field();

        $field->field_group_type = $request->input('group_type');
        $field->field_group_value = $request->input('group_value');
        $field->name = $request->input('name');
        $field->placeholder = $request->input('placeholder');
        $field->identifier = $request->input('identifier');
        $field->type = $request->input('type');
        $field->required = $request->input('required') == 1;
        $field->shown_on_table = $request->input('shown_on_table') == 1;
        $field->translated = $request->input('translated') == 1;

        switch ($request->input('type')) {
            case Field::TYPES['string']:
            case Field::TYPES['editor']:
            case Field::TYPES['textarea']:
            {
                $request->validate([
                    'translated' => 'required|boolean',
                    'min_length' => 'required|numeric|min:0',
                    'max_length' => 'required|numeric|gt:min_length|max:' . PHP_INT_MAX,
                ]);

                $field->min_length = $request->input('min_length');
                $field->max_length = $request->input('max_length');

                break;
            }
            case Field::TYPES['number']:
            {
                $request->validate([
                    'min' => 'required|numeric|min:' . PHP_INT_MIN,
                    'max' => 'required|numeric|max:' . PHP_INT_MAX,
                    'step' => 'required|string',
                ]);

                $field->min = $request->input('min');
                $field->max = $request->input('max');
                $field->step = $request->input('step');

                break;
            }
        }

        $field->save();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function update(Request $request, int $id): Response
    {
        $field = Field::findOrFail($id);

        $request->validate([
            'type' => ['required', Rule::in(Field::TYPES)],
            'group_type' => ['required', Rule::in(Field::GROUPS)],
            'group_value' => ['required', Rule::in(array_unique(array_merge(Page::TYPES, Post::TYPES)))],
            'name' => 'required|array',
            'name.*' => 'required|string|max:255',
            'placeholder' => 'required|array',
            'placeholder.*' => 'required|string|max:255',
            'required' => 'required|boolean',
            'shown_on_table' => 'required|boolean',
            'translated' => 'sometimes|required|in:0,1',
            'identifier' => ['required', 'string', 'alpha_dash', Rule::unique('fields')
                ->ignoreModel($field)
                ->where('field_group_type', $request->input('group_type'))
                ->where('field_group_value', $request->input('group_value'))
            ]
        ]);

        $field->field_group_type = $request->input('group_type');
        $field->field_group_value = $request->input('group_value');
        $field->name = $request->input('name');
        $field->placeholder = $request->input('placeholder');
        $field->identifier = $request->input('identifier');
        $field->type = $request->input('type');
        $field->required = $request->input('required') == 1;
        $field->shown_on_table = $request->input('shown_on_table') == 1;
        $field->translated = $request->input('translated') == 1;

        switch ($request->input('type')) {
            case Field::TYPES['string']:
            case Field::TYPES['editor']:
            case Field::TYPES['textarea']:
            {
                $request->validate([
                    'translated' => 'required|boolean',
                    'min_length' => 'required|numeric|min:0',
                    'max_length' => 'required|numeric|gt:min_length|max:' . PHP_INT_MAX,
                ]);

                $field->min_length = $request->input('min_length');
                $field->max_length = $request->input('max_length');

                break;
            }
            case Field::TYPES['number']:
            {
                $request->validate([
                    'min' => 'required|numeric|min:' . PHP_INT_MIN,
                    'max' => 'required|numeric|max:' . PHP_INT_MAX,
                    'step' => 'required|string',
                ]);

                $field->min = $request->input('min');
                $field->max = $request->input('max');
                $field->step = $request->input('step');

                break;
            }
        }

        $field->save();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function edit(int $id): FieldEditResource
    {
        $field = Field::findOrFail($id);

        return new FieldEditResource($field);
    }

    public function destroy(int $id): Response
    {
        $field = Field::findOrFail($id);

        $field->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
