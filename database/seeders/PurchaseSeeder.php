<?php

namespace Database\Seeders;
use App\Models\Purchase;
use App\Models\Address;


use Illuminate\Database\Seeder;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $newPurchase = new Purchase();
        $newPurchase->id = 1 ;
        $newPurchase->fullname = "Andy Samson" ;
        $newPurchase->email = "andy@mail.com";
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
}
