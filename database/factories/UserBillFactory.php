<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserBill>
 */
class UserBillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => function(){
                return User::factory()->create()->id;
            },
            'event_id' => function(){
                return Event::factory()->create()->id;
            },
            'bill_amount' => $this->faker->randomFloat(2, 10, 100),
            'number_of_tickets' => $this->faker->numberBetween(1, 10),
            'bill_status' => $this->faker->randomElement(['unpaid', 'paid']),
        ];
    }
}
