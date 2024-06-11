<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$MU2vXIFvOvCFa.cnipZE7.KjYONN0XJWQMQvMGJgj8IpBZZn733JW',
      
        ])->assignRole('Editor', 'Admin');

        User::create([
            'name' => 'Viewer',
            'email' => 'viewer@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$MU2vXIFvOvCFa.cnipZE7.KjYONN0XJWQMQvMGJgj8IpBZZn733JW',
      
        ])->assignRole('Viewer');
    }
}
