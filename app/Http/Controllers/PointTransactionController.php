<?php

namespace App\Http\Controllers;

use App\Models\PointTransaction;
use App\Http\Requests\StorePointTransactionRequest;
use App\Http\Requests\UpdatePointTransactionRequest;
use App\Models\Setting;
use App\Models\User;

class PointTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = optional(Setting::whereKey("per_page")->first())->value ?? 25;
        $pointTransactions = PointTransaction::query()->paginate($perPage);
        return view("admin.point-transactions.index" , compact("pointTransactions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::query()/*->role("admin")*/->pluck("name", "id");
        return view("admin.point-transactions.create" , compact("users"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePointTransactionRequest $request)
    {
        $data = $request->validated();

        PointTransaction::create($data);

        flash()->success(__('Point transactions') . ": " . __("created successfully"));

        return redirect()->route("admin.point-transactions.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PointTransaction $pointTransaction)
    {
        $pointTransaction->delete();

        flash()->success(__('Point transactions') . ": " . __("deleted successfully"));

        return redirect()->route("admin.point-transactions.index");
    }
}
