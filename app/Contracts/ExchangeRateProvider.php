<?php

namespace App\Contracts;

use App\DTOs\ExchangeRate\ExchangeRateListData;
use App\Models\Currency;

interface ExchangeRateProvider
{
    public function fetchExchangeRatesByCurrency(Currency $currency): ExchangeRateListData;
}