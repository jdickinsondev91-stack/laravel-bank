<?php 

namespace App\DTOs\ExchangeRate;

use App\Models\Currency;
use Carbon\Carbon;

class ExchangeRateListData 
{
    public readonly Currency $baseCurrency;
    public readonly Carbon $rateDate;
    public array $conversionRates = [];
    
    public static function fromApiResponse(array $response): self
    {
        $dto = new self();
        $dto->baseCurrency = $response['base_currency'];
        $dto->rateDate = $response['rate_date'] ?? Carbon::now(); 

        foreach ($response['rates'] as $currencyCode => $rate) {
            $dto->conversionRates[] = ConversionRateData::fromApiResponse([
                'currency_code' => $currencyCode,
                'rate' => $rate,
            ]);
        }
        
        return $dto;
    }

    public function toArray(): array
    {
        return [
            'base_currency' => $this->baseCurrency->toArray(),
            'rate_date' => $this->rateDate->toDateString(),
            'conversion_rates' => array_map(fn($rate) => $rate->toArray(), $this->conversionRates),
        ];
    }
}