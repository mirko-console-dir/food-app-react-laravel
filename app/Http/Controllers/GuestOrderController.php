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
        $newPurchase->fullname = "Andy Samson" ;
        $newPurchase->email = $request->email;
        $newPurchase->phone = "+61 212313";
        $newPurchase->cart_json = "";
        $newPurchase->amount = 21;
        
        $newPurchase->save();

        $newShippingAddress = new Address();
        $newShippingAddress->street = "15 Bennet st";
        $newShippingAddress->town = "Bondi";
        $newShippingAddress->state = "NSW";
        $newShippingAddress->post_code = "2000";
        $newShippingAddress->note = "Nessuna in particular";
        $newShippingAddress->type = 'delivery';
        $newShippingAddress->save();
        $shippingAdd = Address::orderBy('id', 'desc')->first();
     
        $newPurchase->addresses()->attach($shippingAdd); 

        $newBillingAddress = new Address();
        $newBillingAddress->street = "15 Bennet st";
        $newBillingAddress->town = "Bondi";
        $newBillingAddress->state = "NSW";
        $newBillingAddress->post_code = "2000";
        $newShippingAddress->type = 'bill';
        $billingAdd = Address::orderBy('id', 'desc')->first();

        $newPurchase->addresses()->attach($billingAdd); 
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
