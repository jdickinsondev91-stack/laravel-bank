<?php

namespace Database\Factories;

use App\Models\TransactionSubtype;
use App\Models\TransactionType;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionSubtypeFactory extends Factory
{
    protected $model = TransactionSubtype::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'slug' => $this->faker->slug,
            'transaction_type_id' => fn () => TransactionType::factory()->create()->id,
        ];
    }
}