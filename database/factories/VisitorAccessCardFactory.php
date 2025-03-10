<?php

namespace Database\Factories;

use App\Models\VisitorAccessCard;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VisitorAccessCard>
 */
class VisitorAccessCardFactory extends Factory
{

    protected $model =VisitorAccessCard::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'card_number'=>fake()->unique()->numerify('PS-VS-####'),
            'status'=>'available',
        ];
    }
}
