<?php

namespace App\Http\Controllers;

use App\Http\Resources\FieldValueEditResource;
use App\Http\Resources\FieldValueListResource;
use App\Models\Field;
use App\Models\FieldValue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class FieldValueController extends ApiController
{
    public function index(int $id): ResourceCollection
    {
        $fieldValues = FieldValue::whereFieldId($id)->orderBy($this->orderBy, $this->orderDir);

        if (!blank($this->keywords)) {
            $fieldValues->where(function (Builder $query) {
                $query->whereJsonContains('value', $this->keywords);
            });
        }

        if ($this->paginate) {
            $fieldValues = $fieldValues->paginate($this->perPage);
        } else {
            $fieldValues = $fieldValues->get();
        }

        return FieldValueListResource::collection($fieldValues);
    }

    public function store(Request $request, int $id): Response
    {
        $request->validate([
            'name' => 'required|array',
            'name.*' => 'required|string|max:255'
        ]);

        $field = Field::findOrFail($id);

        $fieldValue = new FieldValue();

        $fieldValue->field_id = $field->id;
        $fieldValue->value = $request->input('name');

        $fieldValue->save();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function show(int $id, int $fieldValueId): FieldValueEditResource
    {
        $field = Field::findOrFail($id);

        /** @var $fieldValue FieldValue */
        $fieldValue = $field->values->find($fieldValueId);

        abort_unless($fieldValue, Response::HTTP_NOT_FOUND);

        return new FieldValueEditResource($fieldValue);
    }

    public function update(Request $request, int $id, int $fieldValueId): Response
    {
        $field = Field::findOrFail($id);

        /** @var $fieldValue FieldValue */
        $fieldValue = $field->values->find($fieldValueId);

        abort_unless($fieldValue, Response::HTTP_NOT_FOUND);

        $request->validate([
            'name' => 'required|array',
            'name.*' => 'required|string|max:255'
        ]);

        $fieldValue->value = $request->input('name');

        $fieldValue->save();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function destroy(int $id, int $fieldValueId): Response
    {
        $field = Field::findOrFail($id);

        /** @var $fieldValue FieldValue */
        $fieldValue = $field->values->find($fieldValueId);

        abort_unless($fieldValue, Response::HTTP_NOT_FOUND);

        $fieldValue->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
