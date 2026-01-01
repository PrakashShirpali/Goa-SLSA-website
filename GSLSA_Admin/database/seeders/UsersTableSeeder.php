<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Seeding data for the 'users' table
        DB::table('english_schema.users')->insert([
            'name' => 'Prakash',
            'email' => 'shirpali1999@gmail.com',
            'password' => Hash::make('prakash'),
            'is_superuser' => true, // Set the user as a superuser
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}


// php artisan db:seed --class=UsersTableSeeder
