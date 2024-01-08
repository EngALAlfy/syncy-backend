<?php

namespace App\Http\Controllers;

use App\Http\Resources\CountryResource;
use App\Http\Resources\StateResource;
use App\Models\Country;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Models\Setting;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = optional(Setting::whereKey("per_page")->first())->value ?? 25;
        $countries = Country::query()->paginate($perPage);
        return view("admin.countries.index" , compact("countries"));
    }

    public function apiIndex()
    {
        $countries = Country::query()->with("states:id,name,country_id")->withCount("posts")->get();
        return $this->sendJsonSuccess(CountryResource::collection($countries));
    }

    public function apiShow(Country $country)
    {
        $country = $country->withCount("posts")->with("states")->get();
        return $this->sendJsonSuccess(new CountryResource($country));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.countries.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCountryRequest $request)
    {
        $data = $request->validated();

        if(array_key_exists("image" , $data)){
            $data["image"] = upload_image($data["image"]);
        }

        Country::create($data);

        flash()->success(__('Countries') . ": " . __("created successfully"));

        return redirect()->route("admin.countries.index");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        return view("admin.countries.edit" , compact("country"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        $data = $request->validated();

        if(array_key_exists("image" , $data)){
            $data["image"] = upload_image($data["image"]);
        }

        $country->update($data);

        flash()->success(__('Countries') . ": " . __("updated successfully"));

        return redirect()->route("admin.countries.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        $country->delete();

        flash()->success(__('Countries') . ": " . __("deleted successfully"));

        return redirect()->route("admin.countries.index");
    }
}
