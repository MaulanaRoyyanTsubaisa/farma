<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\ProductTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();

        if ($user->hasRole('buyer')) {
            $product_transactions = $user->product_transactions()->orderBy('id', 'desc')->get();
        } else {
            $product_transactions = ProductTransaction::orderBy('id', 'desc')->get();
        }


        return view('admin.product_transaction.index', [
            'product_transactions' => $product_transactions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductTransaction $productTransaction)
    {
        //
        $productTransaction = ProductTransaction::with('transactionDetails.product')->find($productTransaction->id);
        return view('admin.product_transaction.details', [
            'productTransaction' => $productTransaction
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductTransaction $productTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductTransaction $productTransaction)
    {
        //
        $productTransaction->update([
           'is_paid' => true,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductTransaction $productTransaction)
    {
        //
    }
}
