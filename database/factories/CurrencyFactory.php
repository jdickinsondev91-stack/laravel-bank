<?php

namespace Database\Factories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

class CurrencyFactory extends Factory
{
    protected $model = Currency::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'code' => $this->faker->currencyCode,
            'symbol' => $this->faker->currencySymbol,
            'decimal_places' => $this->faker->numberBetween(0, 4),
            'is_active' => $this->faker->boolean,
        ];
    }
}