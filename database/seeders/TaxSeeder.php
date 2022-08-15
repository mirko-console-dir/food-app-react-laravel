<?php

namespace Database\Seeders;
use App\Models\Tax;
use Illuminate\Database\Seeder;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taxes = [22, 10];

        foreach ($taxes as $tax) {
            $newTax = new Tax();
            $newTax->percentage = $tax;
            $newTax->save();
        }
    }
}
