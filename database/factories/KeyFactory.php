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
        return [
            //
            'key_number'=>fake()->numerify('ICUU#######'),
            'key_name'=>fake()->randomElement(['Office','Store','Main Door','Audit','Data Center','Business','Sales','Marketing']),
        ];
    }
}
