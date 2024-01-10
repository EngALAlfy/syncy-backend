<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountStoreRequest;
use App\Http\Requests\AccountUpdateRequest;
use App\Http\Resources\AccountResource;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AccountController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $accounts = Account::all();

        return $this->sendJsonSuccess(AccountResource::collection($accounts));
    }

    public function store(AccountStoreRequest $request): JsonResponse
    {
        $account = Account::create($request->validated());

        return $this->sendJsonSuccess(new AccountResource($account));
    }

    public function show(Request $request, Account $account): JsonResponse
    {
        return $this->sendJsonSuccess(new AccountResource($account));
    }

    public function update(AccountUpdateRequest $request, Account $account): JsonResponse
    {
        $account->update($request->validated());

        return $this->sendJsonSuccess(new AccountResource($account));
    }

    public function destroy(Request $request, Account $account): JsonResponse
    {
        $account->delete();

        return $this->sendJsonSuccess();
    }
}
