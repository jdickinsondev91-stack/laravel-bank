<?php 

namespace App\Services;

use App\Contracts\ExchangeRateProvider;
use App\DTOs\ExchangeRate\ConversionRateData;
use App\DTOs\ExchangeRate\CreateExchangeRateData;
use App\DTOs\ExchangeRate\UpdateExchangeRateData;
use App\Models\Currency;
use App\Models\ExchangeRate;
use App\Repositories\Interfaces\CurrencyRepository;
use App\Repositories\Interfaces\ExchangeRateRepository;
use Carbon\Carbon;

class ExchangeRateService
{
    public function __construct(
        private ExchangeRateProvider $exchangeRateProvider,
        private CurrencyRepository $currencyRepository,
        private ExchangeRateRepository $exchangeRateRepository
    ) {}

    public function storeLatestExchangeRates(string $currencyCode): bool
    {
        $currency = $this->currencyRepository->findByCode($currencyCode);

        if (!$currency) {
            throw new \InvalidArgumentException("Currency with code {$currencyCode} not found.");
        }

        $exchangeRateData = $this->exchangeRateProvider->fetchExchangeRatesByCurrency($currency);

        if (empty($exchangeRateData->conversionRates)) {
            throw new \RuntimeException("No exchange rates found for currency {$currencyCode}.");
        }

        foreach ($exchangeRateData->conversionRates as $conversionRate) {
            $this->storeExchangeRate($currency, $exchangeRateData->rateDate, $conversionRate);
        }
        
        return true;
    }

    private function storeExchangeRate(Currency $baseCurrency, Carbon $date, ConversionRateData $conversionRateData): ExchangeRate
    {
        $targetCurrency = $this->currencyRepository->findByCode($conversionRateData->currencyCode);

        if (!$targetCurrency) {
            throw new \InvalidArgumentException("Target currency with code {$conversionRateData->currencyCode} not found.");
        }

        $exchangeRateData = [
            'base_currency_id' => $baseCurrency->id,
            'target_currency_id' => $targetCurrency->id,
            'rate' => $conversionRateData->rate,
            'rate_date' => $date,
        ];

        $exchangeRate = $this->exchangeRateRepository->findExistingExchangeRate(
            $baseCurrency->id,
            $targetCurrency->id,
            $date
        );

        if (!$exchangeRate) {

            $createExchangeRateData = CreateExchangeRateData::fromArray($exchangeRateData);

            $exchangeRate = $this->exchangeRateRepository->create($createExchangeRateData);
        } else {

            $updateExchangeRateData = UpdateExchangeRateData::fromArray($exchangeRateData);
            $updateExchangeRateData->id = $exchangeRate->id;

            $exchangeRate = $this->exchangeRateRepository->update($exchangeRate->id, $updateExchangeRateData);
        }

        return $exchangeRate;
    }
}