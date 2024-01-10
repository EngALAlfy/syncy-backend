<?php

namespace App\Http\Controllers;

use App\Http\Requests\AaccountStoreRequest;
use App\Http\Requests\AaccountUpdateRequest;
use App\Http\Resources\AaccountCollection;
use App\Http\Resources\AaccountResource;
use App\Models\Aaccount;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AaccountController extends Controller
{
    public function index(Request $request): Response
    {
        $aaccounts = Aaccount::all();

        return new AaccountCollection($aaccounts);
    }

    public function store(AaccountStoreRequest $request): Response
    {
        $aaccount = Aaccount::create($request->validated());

        return new AaccountResource($aaccount);
    }

    public function show(Request $request, Aaccount $aaccount): Response
    {
        return new AaccountResource($aaccount);
    }

    public function update(AaccountUpdateRequest $request, Aaccount $aaccount): Response
    {
        $aaccount->update($request->validated());

        return new AaccountResource($aaccount);
    }

    public function destroy(Request $request, Aaccount $aaccount): Response
    {
        $aaccount->delete();

        return response()->noContent();
    }
}
