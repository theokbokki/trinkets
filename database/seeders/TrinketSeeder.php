<?php

namespace Database\Seeders;

use App\Models\Trinket;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class TrinketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trinket::factory(20)->create();
    }
}
