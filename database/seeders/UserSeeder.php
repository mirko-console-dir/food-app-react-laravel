<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'is_admin' =>'1',
                'password' => Hash::make('mirko')
            ],
            [
                'name' => 'User',
                'email' => 'pippo@mail.com',
                'is_admin' =>'0',
                'password' => Hash::make('mirko')
            ]
        ];
        foreach ($users as $key => $value){
            User::create($value);
        }
    }
}
