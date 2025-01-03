<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{

    protected $model = Employee::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'department_id' => Department::factory(),
            // 'department'    => fake()->randomElement(['tech', 'business', 'hr', 'finance','audit']),
            'job_title' => fake()->jobTitle(),
            'gender' => fake()->randomElement(['male', 'female']),
        ];
    }
}
