<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
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
            // 'name' => $this->faker->name,
            // 'description' => $this->faker->sentence,
            'location' => $this->faker->city,
            // 'time' => $this->faker->time,
            'image' => 'path/to/image.jpg',
            'category' => $this->faker->randomElement(['grad','travel']),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            // 'date' => $this->faker->date,
            'ticket_price' => $this->faker->numberBetween(10, 100),
            // 'free_guests' => $this->faker->numberBetween(0, 50),
            // 'paid_guests' => $this->faker->numberBetween(0, 50),
            'extra_price' => $this->faker->randomFloat(2, 0, 50),
            'vod__cash' => $this->faker->phoneNumber(),
            'etis__cash' => $this->faker->phoneNumber(),
        ];
    }
}
