<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trinket>
 */
class TrinketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->word();

        return [
            'title' => $title,
            'slug' => str()->slug($title),
            'excerpt' => fake()->sentence(),
            'link' => fake()->url(),
        ];
    }
}
