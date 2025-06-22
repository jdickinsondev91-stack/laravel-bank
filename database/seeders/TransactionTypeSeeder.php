<?php

namespace Database\Seeders;

use App\Enums\TransactionTypeEnums;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (TransactionTypeEnums::cases() as $type) {
            DB::table('transaction_types')->insert([
                'id' => Str::uuid(),
                'name' => $type->label(),
                'slug' => $type->value,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
