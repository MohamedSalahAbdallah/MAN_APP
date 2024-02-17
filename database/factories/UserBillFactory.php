<?php

namespace Database\Factories;

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
            'bill_amount' => fake()->randomFloat(2, 100, 1000),
            'bill_date' => fake()->date(),
            'bill_description' => fake()->text(),
            'bill_status' => fake()->randomElement(['paid', 'unpaid']),
            'user_id' => function () {
                return User::factory()->create()->id;
            },
        ];
    }
}
