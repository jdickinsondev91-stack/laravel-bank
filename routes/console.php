<?php

use App\Jobs\ProcessDailyExchangeRates;
use Illuminate\Support\Facades\Schedule;

Schedule::job(new ProcessDailyExchangeRates)
    ->daily()
    ->at('00:00')
    ->timezone('UTC')
    ->onQueue('exchange_rates');
