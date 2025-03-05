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

        static $modules = ['user','keys','logs','settings','reports','staff','departments','roles'];

        $module = count($modules)>0
            ? array_shift($modules)
            : 'generated-' . fake()->unique()->word();
        return [
            'name'=> $module,
            'description'=>fake()->catchPhrase(),
        ];
    }
}
