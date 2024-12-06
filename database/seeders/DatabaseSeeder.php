<?php

namespace Database\Seeders;

use App\Models\Project;
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

        User::factory()->create([
            'username' => 'admin@example',
            'first_name' => 'Test user',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => 'password',
            'profile_photo_path' => 'pmsAssets/default.png'
        ]);

        User::factory()->create([
            'username' => 'encoder@example',
            'first_name' => 'Encoder',
            'last_name' => 'Encoder',
            'email' => 'encoder@example.com',
            'role' => 'encoder',
            'password' => 'password',
            'profile_photo_path' => 'pmsAssets/default.png'
        ]);

        User::factory()->create([
            'username' => 'projectIncharge@example',
            'first_name' => 'Project',
            'last_name' => 'Incharge',
            'email' => 'projectIncharge@example.com',
            'role' => 'project incharge',
            'password' => 'password',
            'profile_photo_path' => 'pmsAssets/default.png'
        ]);
    }
}
