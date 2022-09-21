<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Models\Purchase;
use App\Models\Address;

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
            'amount' => 'required',
            'user_id' => 'nullable',
            'delivery_street' => 'required',
            'delivery_town' => 'required',
            'delivery_state' => 'required',
            'delivery_post_code' => 'required',
            'note' => 'nullable',
            'bill_street' => 'nullable',
            'bill_town' => 'nullable',
            'bill_state' => 'required',
            'bill_post_code' => 'nullable',
        ]);
        // nuovo purchase
        $newPurchase = new Purchase();
        $newPurchase->fullname = $validated['fname'] . ' ' . $validated['lname'];
        $newPurchase->email = $validated['email'];
        $newPurchase->phone = $validated['phone'];
        $newPurchase->cart_json = $request->cart;
        $newPurchase->amount = $validated['amount'];
        $newPurchase->user_id = $validated['user_id'];
        $newPurchase->save();
        // salvo il nuovo purchase in una variabile
        $purchase = Purchase::latest()->first();

        // nuovi indirizzi: uno per spedizione...
        $newShippingAddress = new Address();
        $newShippingAddress->street = $validated['delivery_street'];
        $newShippingAddress->town = $validated['delivery_town'];
        $newShippingAddress->state = $validated['delivery_state'];
        $newShippingAddress->post_code = $validated['delivery_post_code'];
        $newShippingAddress->note = $validated['note'];
        $newShippingAddress->type = 'delivery';
        $newShippingAddress->save();
        $shippingAdd = Address::orderBy('id', 'desc')->first();

        // 'attacco'
        $purchase->addresses()->attach($shippingAdd);

        // ... e uno per fatturazione
        $newBillingAddress = new Address();
        $newBillingAddress->street = $validated['bill_street'];
        if(empty($newBillingAddress->street)){
         $newBillingAddress->street = $validated['delivery_via'];
        }
        $newBillingAddress->town = $validated['bill_town'];
        if(empty($newBillingAddress->town)){
         $newBillingAddress->town = $validated['delivery_town'];
        }
        $newBillingAddress->state = $validated['bill_state'];
        if(empty($newBillingAddress->state)){
         $newBillingAddress->state = $validated['delivery_state'];
        }
        $newBillingAddress->cap = $validated['bill_post_code'];
        if(empty($newBillingAddress->post_code)){
         $newBillingAddress->post_code = $validated['delivery_post_code'];
        }
        $newBillingAddress->type = 'bill';
        $newBillingAddress->save();
        $billingAdd = Address::orderBy('id', 'desc')->first();

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
