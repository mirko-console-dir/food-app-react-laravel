<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['pizza'],
            ['focaccia'],
            ['chef choice'],
        ];

        foreach ($categories as $cat) {
            $newCat = new Category();
            $newCat->name = $cat[0];
            $newCat->save();
        }
    }
}
