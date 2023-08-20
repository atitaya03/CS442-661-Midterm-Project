<?php

namespace Database\Factories;
use App\Models\Organizer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Board>
 */
class BoardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        
            'organizer_id' =>fake()->numberBetween(1,Organizer::count()),
            'header' => fake()->realTextBetween(5,10)
        ];
    }
}
