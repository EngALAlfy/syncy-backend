<?php

namespace App\Http\Controllers;

use App\Http\Requests\KeyStoreRequest;
use App\Http\Requests\KeyUpdateRequest;
use App\Http\Resources\KeyCollection;
use App\Http\Resources\KeyResource;
use App\Models\Key;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KeyController extends Controller
{
    public function index(Request $request): Response
    {
        $keys = Key::all();

        return new KeyCollection($keys);
    }

    public function store(KeyStoreRequest $request): Response
    {
        $key = Key::create($request->validated());

        return new KeyResource($key);
    }

    public function show(Request $request, Key $key): Response
    {
        return new KeyResource($key);
    }

    public function update(KeyUpdateRequest $request, Key $key): Response
    {
        $key->update($request->validated());

        return new KeyResource($key);
    }

    public function destroy(Request $request, Key $key): Response
    {
        $key->delete();

        return response()->noContent();
    }
}
