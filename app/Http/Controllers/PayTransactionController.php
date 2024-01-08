<?php

namespace App\Http\Controllers;

use App\Helpers\TransactionStatus;
use App\Models\PayTransaction;
use App\Http\Requests\StorePayTransactionRequest;
use App\Http\Requests\UpdatePayTransactionRequest;
use App\Models\Setting;
use App\Models\User;

class PayTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = optional(Setting::whereKey("per_page")->first())->value ?? 25;
        $payTransactions = PayTransaction::query()->paginate($perPage);
        return view("admin.pay-transactions.index" , compact("payTransactions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::query()/*->role("admin")*/->pluck("name", "id");
        return view("admin.pay-transactions.create" , compact("users"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePayTransactionRequest $request)
    {
        $data = $request->validated();

        $data["status"] = TransactionStatus::SUCCESS->name;
        PayTransaction::create($data);

        flash()->success(__('Pay transactions') . ": " . __("created successfully"));

        return redirect()->route("admin.pay-transactions.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PayTransaction $payTransaction)
    {
        $payTransaction->delete();

        flash()->success(__('Pay transactions') . ": " . __("deleted successfully"));

        return redirect()->route("admin.pay-transactions.index");
    }
}
