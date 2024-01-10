<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoStoreRequest;
use App\Http\Requests\TodoUpdateRequest;
use App\Http\Resources\TodoCollection;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoController extends Controller
{
    public function index(Request $request): Response
    {
        $todos = Todo::all();

        return new TodoCollection($todos);
    }

    public function store(TodoStoreRequest $request): Response
    {
        $todo = Todo::create($request->validated());

        return new TodoResource($todo);
    }

    public function show(Request $request, Todo $todo): Response
    {
        return new TodoResource($todo);
    }

    public function update(TodoUpdateRequest $request, Todo $todo): Response
    {
        $todo->update($request->validated());

        return new TodoResource($todo);
    }

    public function destroy(Request $request, Todo $todo): Response
    {
        $todo->delete();

        return response()->noContent();
    }
}
