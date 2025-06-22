<?php

namespace Database\Seeders;

use Illuminate\Support\Str; 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('users')->insert([
            'id' => (string) Str::uuid(),
            'first_name' => 'Admin',
            'last_name' => 'User',
            'phone_number' => '1234567890',
            'email' => env('ADMIN_EMAIL'),
            'email_verified_at' => now(),
            'is_admin' => true,
            'password' => bcrypt(env('ADMIN_PASSWORD')),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
       ]);
    
    }
}
