<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\developer;
use Illuminate\Support\Facades\Hash;

class developerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        developer::create([
            'name'=>'developer',
            'username'=>'developer',
            'email'=>'dev@gmail.com',
            'password'=>Hash::make('developer'),
            'role'=>'developer'
        ]);
    }
}
