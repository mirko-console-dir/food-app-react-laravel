<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Models\Purchase;
use App\Models\Addresse;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePurchaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePurchaseRequest $request)
    {
        $validated = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'fiscal_code' => 'required',
            'amount' => 'required',
            'user_id' => 'nullable',
            'sped_via' => 'required',
            'sped_city' => 'required',
            'sped_province' => 'required',
            'sped_cap' => 'required',
            'note' => 'nullable',
            'fatt_via' => 'nullable',
            'fatt_city' => 'nullable',
            'fatt_province' => 'nullable',
            'fatt_cap' => 'nullable',
        ]);
        // nuovo purchase
        $newPurchase = new Purchase();
        $newPurchase->fullname = $validated['fname'] . ' ' . $validated['lname'];
        $newPurchase->email = $validated['email'];
        $newPurchase->phone = $validated['phone'];
        $newPurchase->amount = $validated['amount'];
        $newPurchase->fiscal_code = $validated['fiscal_code'];
        $newPurchase->user_id = $validated['user_id'];
        $newPurchase->save();
        // salvo il nuovo purchase in una variabile
        $purchase = Purchase::latest()->first();

        // nuovi indirizzi: uno per spedizione...
        $newShippingAddress = new Addresse();
        $newShippingAddress->via = $validated['sped_via'];
        $newShippingAddress->city = $validated['sped_city'];
        $newShippingAddress->province = $validated['sped_province'];
        $newShippingAddress->cap = $validated['sped_cap'];
        $newShippingAddress->note = $validated['note'];
        $newShippingAddress->type = 'spedizione';
        $newShippingAddress->save();
        $shippingAdd = Addresse::orderBy('id', 'desc')->first();

        // 'attacco'
        $purchase->addresses()->attach($shippingAdd);

        // ... e uno per fatturazione
        $newBillingAddress = new Addresse();
        $newBillingAddress->via = $validated['fatt_via'];
        if(empty($newBillingAddress->via)){
         $newBillingAddress->via = $validated['sped_via'];
        }
        $newBillingAddress->city = $validated['fatt_city'];
        if(empty($newBillingAddress->city)){
         $newBillingAddress->city = $validated['sped_city'];
        }
        $newBillingAddress->province = $validated['fatt_province'];
        if(empty($newBillingAddress->province)){
         $newBillingAddress->province = $validated['sped_province'];
        }
        $newBillingAddress->cap = $validated['fatt_cap'];
        if(empty($newBillingAddress->cap)){
         $newBillingAddress->cap = $validated['sped_cap'];
        }
        $newBillingAddress->type = 'fatturazione';
        $newBillingAddress->save();
        $billingAdd = Addresse::orderBy('id', 'desc')->first();

        // 'attacco'
        $purchase->addresses()->attach($billingAdd);

        return redirect('/purchases');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePurchaseRequest  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePurchaseRequest $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
