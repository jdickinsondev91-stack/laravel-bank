<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\AccountType;
use App\Models\Currency;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    protected $model = Account::class;

    public function definition()
    {
        return [
            'user_id' => fn () => User::factory()->create()->id,
            'account_type_id' => fn () => AccountType::factory()->create()->id,
            'currency_id' => fn () => Currency::factory()->create()->id,
            'sort_code' => $this->faker->numerify('##-##-##'),
            'balance' => $this->faker->randomNumber,
            'open' => $this->faker->boolean
        ];
    }
}