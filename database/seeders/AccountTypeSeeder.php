<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Enums\AccountTypeEnums;

class AccountTypeSeeder extends Seeder
{
    public function run(): void
    {
        foreach (AccountTypeEnums::cases() as $accountType) {
            DB::table('account_types')->updateOrInsert(
                ['slug' => $accountType->value],
                [
                    'id' => (string) Str::uuid(),
                    'name' => $accountType->label(),
                    'slug' => $accountType->value,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}