<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'user@user.com',
        //     'password'=> bcrypt('password'),
        //     'role'=> 'User'
        // ]);
        
        // User::factory()->create([
        //     'name' => 'Test Kandidat',
        //     'email' => 'kandidat@kandidat.com',
        //     'password'=> bcrypt('password1'),
        //     'role' => "Kandidat",
        // ]);
        User::factory()->create([
            'name' => 'Admin Yayasan',
            'email' => 'yayasangitacahayakarsa@gmail.com',
            'password'=> bcrypt('adminyayasan'),
            'role' => "Admin",
        ]);
    }
}
