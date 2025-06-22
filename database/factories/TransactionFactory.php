<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Currency;
use App\Models\ExchangeRate;
use App\Models\Transaction;
use App\Models\TransactionSubtype;
use App\Models\TransactionType;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition()
    {
        return [
            'account_id' => fn () => Account::factory()->create()->id,
            'transaction_type_id' => fn () => TransactionType::factory()->create()->id,
            'transaction_subtype_id' => fn () => TransactionSubtype::factory()->create()->id,
            'exchange_rate_id' => fn () => ExchangeRate::factory()->create()->id,
            'from_currency_id' => fn () => Currency::factory()->create()->id,
            'from_amount' => $this->faker->randomNumber(),
            'to_currency_id' => fn () => Currency::factory()->create()->id,
            'to_amount' => $this->faker->randomNumber(),
            'status' => $this->faker->randomElement(['pending', 'completed', 'failed']),
            'reference' => $this->faker->sentence,
        ];
    }
}