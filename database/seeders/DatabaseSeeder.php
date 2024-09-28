<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Théo',
            'email' => 'hello@theoo.dev',
            'password' => bcrypt('change_this'),
        ]);

        $this->call(TrinketSeeder::class);
    }
}
