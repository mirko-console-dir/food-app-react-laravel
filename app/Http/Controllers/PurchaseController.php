<?php

namespace App\Http\Controllers;
use illuminate\Contracts\Support\Jsonable;
use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Models\Purchase;
use App\Models\Address;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { /* ::latest()->get() */
        return view('admin.purchases.purchases');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePurchaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePurchaseRequest $request)
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
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
        return view('admin.purchases.purchase',compact('purchase'));
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
//traversable si può far foreach dei dati
    private function getResult(Jsonable $data, $success = true, $message ='') { 
        return  [
            'data' => $data,
            'success'=> $success,
            'messagee'=> $message,
        ];
    }
}
