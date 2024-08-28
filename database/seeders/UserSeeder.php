<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('users')->truncate();
      User::create([
        'name' => 'Superadmin',
        'email' => 'supermtn@yopmail.com',
        'username' => 'superadmin',
        'password' => Hash::make('1234567890'),
        'created_by' => 1,
        'email_verified_at' => date('Y-m-d H:i:s'),
        'role' => 'superadmin',
      ]);
    }
}
