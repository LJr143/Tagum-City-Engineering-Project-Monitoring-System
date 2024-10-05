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
         user::factory(250)->create();

        User::factory()->create([
            'first_name' => 'Test user',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => 'password',
        ]);
    }
}
