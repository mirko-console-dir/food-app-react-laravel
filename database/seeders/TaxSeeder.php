<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tax;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taxes = [22, 10, 5];

        foreach ($taxes as $tax) {
            $newTax = new Tax();
            $newTax->percentage = $tax;
            $newTax->save();
        }
    }
}
