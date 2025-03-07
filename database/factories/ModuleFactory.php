<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Module>
 */
class ModuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $modules = ['user','visits','keys','logs','settings','reports','staff','departments','roles'];

        return [
            'description'=>fake()->catchPhrase(),
            'name'=> $this->faker->unique()->randomElement($modules),
        ];
    }
}
