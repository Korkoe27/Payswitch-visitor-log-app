<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Visitor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visitor>
 */
class VisitorFactory extends Factory
{

    protected $model = Visitor::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'employee' => Employee::inRandomOrder()->first()->id,
            'company_name' => fake()->company(),
            'access_card_number' => fake()->randomNumber(8),
            'vehicle_number' => fake()->randomNumber(),
            'purpose' => fake()->randomElement(['interview', 'personal', 'official', 'other']),
            'comment' => fake()->sentence(),
            // 'marketing_consent' => fake()->boolean(),
            'devices' => fake()->randomElement(['laptop', 'mobile', 'tablet', 'other']),
            'dependents' => fake()->name(),
        ];
    }
}
