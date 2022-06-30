<?php

namespace App\Http\Controllers;

use App\Http\Resources\RedirectResource;
use App\Models\Redirect;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class RedirectController extends ApiController
{
    public function index(): ResourceCollection
    {
        $redirects = Redirect::orderBy($this->orderBy, $this->orderDir);

        if (!blank($this->keywords)) {
            $redirects->where(function (Builder $query) {
                $query->where('regex', 'ilike', '%' . $this->keywords . '%');
                $query->orWhere('destination', 'ilike', '%' . $this->keywords . '%');
            });
        }

        if ($this->paginate) {
            $redirects = $redirects->paginate($this->perPage);
        } else {
            $redirects = $redirects->get();
        }

        return RedirectResource::collection($redirects);
    }

    public function store(Request $request): Response
    {
        $request->validate([
            'regex' => 'required|string|max:255',
            'destination' => 'required|active_url',
        ]);

        $redirect = new Redirect();

        $redirect->regex = $request->input('regex');
        $redirect->destination = $request->input('destination');

        $redirect->save();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function destroy(int $id): Response
    {
        $redirect = Redirect::findOrFail($id);

        $redirect->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
