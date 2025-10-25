<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'aron.mozes97@gmail.com',
            'password' => Hash::make(env('ADMIN_PASSWORD')),
            'email_verified_at' => now(),
        ]);

        $user->assignRole('admin');
    }
}
