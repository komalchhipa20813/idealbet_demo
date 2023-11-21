<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
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
        User::insert([
            [
                'role'=>1,
                'username' => 'Alita Admin',
                'email' =>'adminAlita@gmail.com',
                'password' => Hash::make('Alita_23'),
                'phoneNo' => '9898989898',
            ],
            // [
            //     'role'=>2,
            //     'username' => 'test Alita Admin',
            //     'email' =>'testadminAlita@gmail.com',
            //     'password' => Hash::make('Alita_23'),
            //     'phoneNo' => '9898989898',
            // ]
        ]);
    }
}
