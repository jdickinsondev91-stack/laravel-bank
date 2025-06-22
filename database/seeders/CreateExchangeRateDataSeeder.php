<?php

namespace Database\Seeders;

use App\Models\Currency;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CreateExchangeRateDataSeeder extends Seeder
{
    private const DAYS = 30;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baseCurrency = Currency::where('code', Currency::DEFAULT_CURRENCY_CODE)->firstOrFail();
        $targetCurrencies = Currency::where('code', '!=', Currency::DEFAULT_CURRENCY_CODE)->get();

        for ($i = 0; $i < self::DAYS; $i++) {
            $date = Carbon::today()->subDays($i);

            foreach ($targetCurrencies as $targetCurrency) {

                DB::table('exchange_rates')->insert([
                    'id' => Str::uuid(),
                    'base_currency_id' => $baseCurrency->id,
                    'target_currency_id' => $targetCurrency->id,
                    'rate' => round(mt_rand(80, 120) / 100, 4),
                    'rate_date' => $date->toDateTimeString(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
