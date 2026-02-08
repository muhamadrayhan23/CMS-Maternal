<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
        'name'=> 'admin',
        'email' => 'admin@gmail.com',
        'password' => 'admin123',
        ]);

        User::create([
        'name'=> 'admin',
        'email' => 'test@gmail.com',
        'password' => 'password',
        ]);

        User::create([
        'name'=> 'hijbi',
        'email' => 'test1@gmail.com',
        'password' => 'password',
        ]);
    }
}
