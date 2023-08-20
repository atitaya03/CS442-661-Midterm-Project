<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->realText($maxNbChars = 50),
            'user_id' => 1,
            'organizer_id' => 1,
            'detail' => fake()->sentence(10),
            'address' => str_replace("\n", ' ', fake()->address),
            'province_id' => 10,
            'district_id' => 1001,
            'subdistrict_id' => 100101,
            'location_detail' => fake()->sentence(),
            'date' => fake()->dateTimeBetween('-1 years', '+1 years'),
            'image_path' => "https://s3-ap-southeast-1.amazonaws.com/tm-img-poster-event/897834403ad711ee911101117567899b.jpg?opt=mild&resize=w200,h290"
        ];
    }
}
