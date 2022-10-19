<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Address;

class GuestOrderController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $newPurchase = new Purchase();
        $newPurchase->fullname = $request->fname . ' ' . $request->lname;
        $newPurchase->email = $request->email;
        $newPurchase->phone = $request->phone;
        $newPurchase->cart_json = $request->cart;
        $newPurchase->amount = $request->amount;
        $newPurchase->user_id = $request->user_id;
        $newPurchase->save();
        /* save in variables the new purchase */
        $purchase = Purchase::latest()->first();

        $newShippingAddress = new Address();
        $newShippingAddress->street = $request->delivery_street;
        $newShippingAddress->town = $request->delivery_town;
        $newShippingAddress->state = $request->delivery_state;
        $newShippingAddress->post_code = $request->delivery_post_code;
        $newShippingAddress->note =$request->note;
        $newShippingAddress->type = 'delivery';
        $newShippingAddress->save();

        $shippingAdd = Address::orderBy('id', 'desc')->first();
     
        $purchase->addresses()->attach($shippingAdd); 

        $newBillingAddress = new Address();
        $newBillingAddress->street = $request->bill_street;
        if(empty($newBillingAddress->street)){
            $newBillingAddress->street = $request->delivery_street;
        }
        $newBillingAddress->town =  $request->bill_town;
        if(empty($newBillingAddress->town)){
            $newBillingAddress->town = $request->delivery_town;
        }
        $newBillingAddress->state = $request->bill_state;
        if(empty($newBillingAddress->state)){
            $newBillingAddress->state = $request->delivery_state;
        }
        $newBillingAddress->post_code = $request->bill_post_code;
        if(empty($newBillingAddress->post_code)){
            $newBillingAddress->post_code = $request->delivery_post_code;
        }
        $newBillingAddress->type = 'bill';
        $newBillingAddress->save();
        
        $billingAdd = Address::orderBy('id', 'desc')->first();
        $purchase->addresses()->attach($billingAdd); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
