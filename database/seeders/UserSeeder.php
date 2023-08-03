<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'admin@gmail.com')->exists()) {
            $admin = User::create([
                'email' => 'admin@gmail.com',
                'nom' => 'admin',
                'prenom' => 'admin',
                'password' => 'password',
            ]);

            $admin->assignRole('super admin');
        }
    }
}
