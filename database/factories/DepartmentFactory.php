<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    protected $model = Department::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Use a static array for predefined unique names
        static $names = ['tech', 'business', 'hr', 'finance', 'audit'];

        // Dynamically generate unique names if the array is exhausted
        $name = count($names) > 0
            ? array_shift($names) // Shift ensures names are consumed uniquely
            : 'generated-' . fake()->unique()->word(); // Ensure uniqueness dynamically

        return [
            'name' => $name,

            // Ensure unique 5-digit random numbers for 'key_id'
            'key_id' => fake()->unique()->numberBetween(10000, 99999),
        ];
    }
}
