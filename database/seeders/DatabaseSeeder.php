<?php

use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\TaxSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\PurchaseSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            TaxSeeder::class,
            //PurchaseSeeder::class,
            //ProductSeeder::class,
        ]);
    }
}
