<?php

namespace Database\Seeders;

use App\Models\Listing;
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
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);

        $users = User::factory(10)->create();
        $projects = Project::factory(5)->recycle($users)->create();
        Listing::factory(5)->recycle($projects)->create();
    }
}
