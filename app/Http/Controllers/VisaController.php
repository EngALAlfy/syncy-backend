<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisaStoreRequest;
use App\Http\Requests\VisaUpdateRequest;
use App\Http\Resources\VisaCollection;
use App\Http\Resources\VisaResource;
use App\Models\Visa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VisaController extends Controller
{
    public function index(Request $request): Response
    {
        $visas = Visa::all();

        return new VisaCollection($visas);
    }

    public function store(VisaStoreRequest $request): Response
    {
        $visa = Visa::create($request->validated());

        return new VisaResource($visa);
    }

    public function show(Request $request, Visa $visa): Response
    {
        return new VisaResource($visa);
    }

    public function update(VisaUpdateRequest $request, Visa $visa): Response
    {
        $visa->update($request->validated());

        return new VisaResource($visa);
    }

    public function destroy(Request $request, Visa $visa): Response
    {
        $visa->delete();

        return response()->noContent();
    }
}
