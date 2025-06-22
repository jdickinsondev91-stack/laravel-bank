<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition()
    {
        return [
            'user_id' => fn () => User::factory()->create()->id,
            'line_1' => $this->faker->streetAddress,
            'line_2' => $this->faker->optional()->secondaryAddress,
            'line_3' => $this->faker->optional()->streetAddress,
            'town' => $this->faker->city,
            'county' => $this->faker->state,
            'postcode' => $this->faker->postcode,
            'is_current' => $this->faker->boolean,
        ];
    }
}