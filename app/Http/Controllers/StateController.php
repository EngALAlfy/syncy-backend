<?php

namespace App\Http\Controllers;

use App\Http\Resources\StateResource;
use App\Models\Country;
use App\Models\State;
use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;
use App\Models\Setting;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = optional(Setting::whereKey("per_page")->first())->value ?? 25;
        $states = State::query()->paginate($perPage);
        return view("admin.states.index" , compact("states"));
    }

    public function apiIndex(Country $country)
    {
        $states = $country->states()->withAggregate("country" , "name")->withCount("posts")->get();
        return $this->sendJsonSuccess(StateResource::collection($states));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::latest()->pluck("name" , "id");
        return view("admin.states.create" , compact("countries"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStateRequest $request)
    {
        $data = $request->validated();

        State::create($data);

        flash()->success(__('States') . ": " . __("created successfully"));

        return redirect()->route("admin.states.index");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state)
    {
        $countries = Country::latest()->pluck("name" , "id");
        return view("admin.states.edit" , compact("state" , "countries"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStateRequest $request, State $state)
    {
        $data = $request->validated();

        $state->update($data);

        flash()->success(__('States') . ": " . __("updated successfully"));

        return redirect()->route("admin.states.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        $state->delete();

        flash()->success(__('States') . ": " . __("deleted successfully"));

        return redirect()->route("admin.states.index");
    }
}
