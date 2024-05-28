<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::select()->delete();
        \App\Models\User::create([
            'UserID' => Str::random(32),
            'full_name' => "Eng. Mohammad Asaad",
            'username' => "moasaad",
            'email' => "info@telexphony.com",
            'phone_number' => "+20156789463",
            'address' => '{"address":"mg 45 -9-8","country":"1","state":"20","city":"307"}',
            // 'email_verified_at' => now(),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'password' => Hash::make('password'), // password
            // 'remember_token' => Str::random(10),
            'remember_token' => Str::random(32),
        ]);
        \App\Models\User::factory(10)->create();
    }
}
