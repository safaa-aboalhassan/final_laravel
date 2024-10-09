<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use illuminate\support\Str;
use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Admin',
            'email'=>'safoooea@gmail.com',
            'password'=>'123',
            'remember_token'=>Str::random(10),
            'is_admin'=>1
        ]);
    }
}
