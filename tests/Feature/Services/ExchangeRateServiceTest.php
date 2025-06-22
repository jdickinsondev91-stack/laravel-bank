<?php

namespace Tests\Feature\Services;

use App\Models\Currency;
use App\Services\ExchangeRateService;
use App\Contracts\ExchangeRateProvider;
use App\DTOs\ExchangeRate\ExchangeRateListData;
use App\Models\ExchangeRate;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExchangeRateServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_latest_exchange_rates_creates_new_exchange_rate(): void
    {
        $gbp = Currency::factory()->create(['code' => 'GBP']);
        $eur = Currency::factory()->create(['code' => 'EUR']);
        $date = Carbon::today();

        $exchangeRateListData = ExchangeRateListData::fromApiResponse([
            'base_currency' => $gbp,
            'rate_date' => $date,
            'rates' => [
                'EUR' => 1.3,
            ],
        ]);

        $mockProvider = $this->createMock(ExchangeRateProvider::class);
        $mockProvider->method('fetchExchangeRatesByCurrency')
                     ->willReturn($exchangeRateListData);           

        $service = app()->makeWith(ExchangeRateService::class, [
            'exchangeRateProvider' => $mockProvider,
        ]);

        $result = $service->storeLatestExchangeRates('GBP');

        $this->assertTrue($result);
        $this->assertDatabaseHas('exchange_rates', [
            'base_currency_id' => $gbp->id,
            'target_currency_id' => $eur->id,
            'rate' => 1.3,
            'rate_date' => $date->toDateTimeString(),
        ]);
    }

    public function test_store_latest_exchange_rates_updates_existing_exchange_rate(): void
    {
        $gbp = Currency::factory()->create(['id' => 'fbc2bbe5-e73f-3d96-9324-7b76f73ad2b4', 'code' => 'GBP']);
        $eur = Currency::factory()->create(['id' => 'e1d533f7-b33a-34c3-87a1-c1aa7920174f', 'code' => 'EUR']);
        $date = Carbon::now();

        // Create an initial exchange rate
        $gbpToEurRate = ExchangeRate::factory()->create([
            'base_currency_id' => $gbp->id,
            'target_currency_id' => $eur->id,
            'rate' => 1.2,
            'rate_date' => $date->copy()->startOfDay(),
        ]);

        $exchangeRateListData = ExchangeRateListData::fromApiResponse([
            'base_currency' => $gbp,
            'rate_date' => $date,
            'rates' => [
                'EUR' => 1.3, // New rate to update
            ],
        ]);

        $mockProvider = $this->createMock(ExchangeRateProvider::class);
        $mockProvider->method('fetchExchangeRatesByCurrency')
                     ->willReturn($exchangeRateListData);

        $service = app()->makeWith(ExchangeRateService::class, [
            'exchangeRateProvider' => $mockProvider,
        ]);

        $result = $service->storeLatestExchangeRates('GBP');

        $this->assertTrue($result);
        $this->assertDatabaseHas('exchange_rates', [
            'id' => $gbpToEurRate->id, // Ensure the same record is updated
            'base_currency_id' => $gbp->id,
            'target_currency_id' => $eur->id,
            'rate' => 1.3, // Updated rate
            'rate_date' => $date->toDateTimeString(),
        ]);
    }
}