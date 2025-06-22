<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = [
            ['code' => 'USD', 'name' => 'US Dollar', 'symbol' => '$', 'id' => Str::uuid()],
            ['code' => 'EUR', 'name' => 'Euro', 'symbol' => '€', 'id' => Str::uuid()],
            ['code' => 'GBP', 'name' => 'British Pound', 'symbol' => '£', 'id' => Str::uuid()],
            ['code' => 'JPY', 'name' => 'Japanese Yen', 'symbol' => '¥', 'id' => Str::uuid()],
            ['code' => 'NGN', 'name' => 'Nigerian Naira', 'symbol' => '₦', 'id' => Str::uuid()],
        ];

        // TODO - Replace with an API call so for now just using this
        DB::table('currencies')->insert($currencies);
    }
}
