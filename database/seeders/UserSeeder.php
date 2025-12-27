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
       User::create([
            'name'=>'Yuga TAMPAN',
            'username'=>'yuga',
            'email'=>'yuga@gmail.com',
            'password'=>Hash::make('123'),
            'role'=>'admin'
        ]);
    }
}
