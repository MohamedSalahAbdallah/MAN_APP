<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'location' => fake()->address(),
            'time' => fake()->time(),
            'image' => fake()->imageUrl(),
            'category' => fake()->word(),
            'status' => fake()->word(),
            'date' => fake()->date(),
            'ticket_price' => fake()->randomFloat(2, 100, 1000),
            'free_guests' => fake()->numberBetween(0, 100),
            'paid_guests' => fake()->numberBetween(0, 100),
        ];
    }
}
