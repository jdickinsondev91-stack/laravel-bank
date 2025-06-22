<?php

namespace Database\Seeders;

use App\Enums\DepositSubtypeEnums;
use App\Enums\ExchangeSubtypeEnums;
use App\Enums\TransactionTypeEnums;
use App\Enums\WithdrawalSubtypeEnums;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransactionSubtypeSeeder extends Seeder
{
    public function run(): void
    {
        $subtypesMap = [
            TransactionTypeEnums::DEPOSIT->value => DepositSubtypeEnums::cases(),
            TransactionTypeEnums::WITHDRAWAL->value => WithdrawalSubtypeEnums::cases(),
            TransactionTypeEnums::EXCHANGE->value => ExchangeSubtypeEnums::cases(),
        ];

        foreach ($subtypesMap as $transactionTypeSlug => $subtypeEnums) {
            $transactionType = DB::table('transaction_types')->where('slug', $transactionTypeSlug)->first();

            if (!$transactionType) {
                $this->command->error("Transaction type '{$transactionTypeSlug}' not found. Skipping subtypes.");
                continue;
            }

            foreach ($subtypeEnums as $subtypeEnum) {
                DB::table('transaction_subtypes')->updateOrInsert(
                    ['slug' => $subtypeEnum->value],
                    [
                        'id' => Str::uuid(),
                        'transaction_type_id' => $transactionType->id,
                        'name' => $subtypeEnum->label(),
                        'slug' => $subtypeEnum->value,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }
        }
    }
}
