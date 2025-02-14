<?php

namespace Database\Factories;

use App\Models\Key;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Key>
 */
class KeyFactory extends Factory
{
    protected $model = Key::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $keys = ['Office', 'Store', 'Main Door', 'Audit', 'Data Center', 'Business', 'Sales', 'Marketing'];

        return [
            'key_number' => $this->faker->unique()->numerify('ICUU#######'),
            'key_name' => $this->faker->unique()->randomElement($keys),
        ];
    }
}
