<?php

namespace App\Jobs;

use App\Models\Currency;
use App\Services\ExchangeRateService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessDailyExchangeRates implements ShouldQueue
{
    use Queueable, InteractsWithQueue, SerializesModels;

    public function handle(ExchangeRateService $exchangeRateService): void
    {
        $exchangeRateService->storeLatestExchangeRates(Currency::DEFAULT_CURRENCY_CODE);
    }
}
