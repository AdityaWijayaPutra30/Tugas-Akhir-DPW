<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users_perpus')->insert([
            'name'=>'Yuga TAMPAN',
            'username'=>'yuga',
            'email'=>'yuga@gmail.com',
            'password'=>Hash::make('123'),
            'role'=>'admin'
        ]);
    }
}
