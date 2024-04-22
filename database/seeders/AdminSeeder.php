<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name' => "Admin User",
            'email' => "leo@ipp.ph",
            'is_admin' => 1,
            'email_verified_at' => now(),
            'password' => Hash::make('user1234'),
            'remember_token' => Str::random(10),
        ];

        User::create($data);
    }
}
