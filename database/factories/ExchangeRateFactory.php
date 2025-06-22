<?php

namespace Database\Factories;

use App\Models\Currency;
use App\Models\ExchangeRate;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExchangeRateFactory extends Factory
{
    protected $model = ExchangeRate::class;

    public function definition()
    {
        return [
            'base_currency_id' => fn () => Currency::factory()->create()->id,
            'target_currency_id' => fn () => Currency::factory()->create()->id,
            'rate' => $this->faker->randomFloat(4, 0, 100),
            'rate_date' => $this->faker->dateTime(),
        ];
    }
}