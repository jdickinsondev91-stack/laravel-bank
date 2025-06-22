<?php 

namespace App\External\ExchangeRates;

use App\Contracts\ExchangeRateProvider;
use App\DTOs\ExchangeRate\ExchangeRateListData;
use App\Models\Currency;
use Illuminate\Support\Facades\Http;

class ExchangeRateApiClient implements ExchangeRateProvider
{
   protected string $apiKey;
   protected string $baseUrl;

   public function __construct() 
   {
         $this->apiKey = config('services.exchange_rate_api.key');
         $this->baseUrl = config('services.exchange_rate_api.base_url');
   }

   public function fetchExchangeRatesByCurrency(Currency $currency): ExchangeRateListData
   {
        $url = "{$this->baseUrl}/{$this->apiKey}/latest/{$currency->code}";

        $response = Http::get($url);

        if ($response->successful() && $response['result'] === 'success') {
            return ExchangeRateListData::fromApiResponse([
                'base_currency' => $currency,
                'rate_date' => $response['time_last_updated_utc'],
                'rates' => $response['conversion_rates'] ?? [],
            ]);
        }  
        
        throw new \Exception("Failed to fetch exchange rates: " . $response->body());
   }
}