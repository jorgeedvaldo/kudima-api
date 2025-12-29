<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where('email', 'edvaldojorge1996@gmail.com')->exists()) {
            User::create([
                'name' => 'Edivaldo Jorge',
                'email' => 'edvaldojorge1996@gmail.com',
                'phone' => '900000000', // Placeholder
                'password' => Hash::make('Muhongo1!'),
                'role' => 'admin',
            ]);
        }
    }
}
