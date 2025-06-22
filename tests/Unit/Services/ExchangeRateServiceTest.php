<?php

namespace Tests\Unit\Services;

use App\Contracts\ExchangeRateProvider;
use App\DTOs\ExchangeRate\ExchangeRateListData;
use App\Models\Currency;
use App\Models\ExchangeRate;
use App\Repositories\Interfaces\CurrencyRepository;
use App\Repositories\Interfaces\ExchangeRateRepository;
use App\Services\ExchangeRateService;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

class ExchangeRateServiceTest extends TestCase
{
    // public function test_store_latest_exchange_rates_creates_or_updates_rates(): void
    // {
    //     $gbp = new Currency(['id' => '123e4567-e89b-12d3-a456-426614174000', 'code' => 'GBP']);
    //     $eur = new Currency(['id' => '123e4567-e89b-12d3-a456-426614174001', 'code' => 'EUR']);
    //     $usd = new Currency(['id' => '123e4567-e89b-12d3-a456-426614174002', 'code' => 'USD']);

    //     $date = Carbon::today();

    //     $exchangeRateListData = ExchangeRateListData::fromApiResponse([
    //         'base_currency' => $gbp,
    //         'rate_date' => $date,
    //         'rates' => [
    //             'USD' => 1.2,
    //             'EUR' => 1.3,
    //         ],
    //     ]);

    //     $currencyRepo = $this->createMock(CurrencyRepository::class);
    //     $exchangeRateRepo = $this->createMock(ExchangeRateRepository::class);
    //     $provider = $this->createMock(ExchangeRateProvider::class);

    //     $currencyRepo->method('findByCode')->willReturnMap([
    //         ['GBP', $gbp],
    //         ['EUR', $eur],
    //         ['USD', $usd],
    //     ]);

    //     $provider->method('fetchExchangeRatesByCurrency')
    //         ->willReturn($exchangeRateListData);

    //     $exchangeRateRepo->method('findExistingExchangeRate')
    //         ->willReturn(null);
            
    //     $exchangeRateRepo->expects($this->exactly(2))
    //         ->method('create');

    //     $service = new ExchangeRateService($provider, $currencyRepo, $exchangeRateRepo);

    //     $result = $service->storeLatestExchangeRates('GBP');

    //     $this->assertTrue($result);
    // }

    // public function test_stroe_latest_exchange_rates_throws_exception_for_invalid_currency(): void
    // {
    //     $currencyRepo = $this->createMock(CurrencyRepository::class);
    //     $exchangeRateRepo = $this->createMock(ExchangeRateRepository::class);
    //     $provider = $this->createMock(ExchangeRateProvider::class);

    //     $currencyRepo->method('findByCode')->willReturn(null);

    //     $service = new ExchangeRateService($provider, $currencyRepo, $exchangeRateRepo);

    //     $this->expectException(\InvalidArgumentException::class);
    //     $this->expectExceptionMessage("Currency with code GBP not found.");

    //     $service->storeLatestExchangeRates('GBP');
    // }

    // public function test_store_latest_exchange_rates_throws_exception_for_no_rates(): void
    // {
    //     $gbp = new Currency(['id' => '123e4567-e89b-12d3-a456-426614174000', 'code' => 'GBP']);
    //     $date = Carbon::today();

    //     $currencyRepo = $this->createMock(CurrencyRepository::class);
    //     $exchangeRateRepo = $this->createMock(ExchangeRateRepository::class);
    //     $provider = $this->createMock(ExchangeRateProvider::class);

    //     $currencyRepo->method('findByCode')->willReturn($gbp);

    //     $exchangeRateListData = ExchangeRateListData::fromApiResponse([
    //         'base_currency' => $gbp,
    //         'rate_date' => $date,
    //         'rates' => [
                
    //         ],
    //     ]);

    //     $provider->method('fetchExchangeRatesByCurrency')->willReturn($exchangeRateListData);

    //     $service = new ExchangeRateService($provider, $currencyRepo, $exchangeRateRepo);

    //     $this->expectException(\RuntimeException::class);
    //     $this->expectExceptionMessage("No exchange rates found for currency GBP.");

    //     $service->storeLatestExchangeRates('GBP');
    // }

    // public function test_store_latest_exchange_rates_throws_exception_for_no_target_currency(): void
    // {
    //     $gbp = new Currency(['id' => '123e4567-e89b-12d3-a456-426614174000', 'code' => 'GBP']);
    //     $date = Carbon::today();

    //     $exchangeRateListData = ExchangeRateListData::fromApiResponse([
    //         'base_currency' => $gbp,
    //         'rate_date' => $date,
    //         'rates' => [
    //             'XYZ' => 1.5, // Non-existent currency
    //         ],
    //     ]);

    //     $currencyRepo = $this->createMock(CurrencyRepository::class);
    //     $exchangeRateRepo = $this->createMock(ExchangeRateRepository::class);
    //     $provider = $this->createMock(ExchangeRateProvider::class);

    //     $currencyRepo->method('findByCode')
    //                  ->willReturnOnConsecutiveCalls($gbp, null);

    //     $provider->method('fetchExchangeRatesByCurrency')->willReturn($exchangeRateListData);

    //     $service = new ExchangeRateService($provider, $currencyRepo, $exchangeRateRepo);

    //     $this->expectException(\InvalidArgumentException::class);
    //     $this->expectExceptionMessage("Target currency with code XYZ not found.");

    //     $service->storeLatestExchangeRates('GBP');
    // }

    // public function test_store_latest_exchange_rates_updates_target_currency(): void 
    // {
    //     $gbp = new Currency(['id' => '123e4567-e89b-12d3-a456-426614174000', 'code' => 'GBP']);
    //     $eur = new Currency(['id' => '123e4567-e89b-12d3-a456-426614174001', 'code' => 'EUR']);
    //     $date = Carbon::today();

    //     $exchangeRate = new ExchangeRate([
    //         'id' => '123e4567-e89b-12d3-a456-426614174003',
    //         'base_currency_id' => $gbp->id,
    //         'target_currency_id' => $eur->id,
    //         'rate' => 1.2,
    //         'rate_date' => Carbon::today(),
    //     ]);
        
    //     $exchangeRateListData = ExchangeRateListData::fromApiResponse([
    //         'base_currency' => $gbp,
    //         'rate_date' => $date,
    //         'rates' => [
    //             'EUR' => 1.5,
    //         ],
    //     ]);

    //     $currencyRepo = $this->createMock(CurrencyRepository::class);
    //     $exchangeRateRepo = $this->createMock(ExchangeRateRepository::class);
    //     $provider = $this->createMock(ExchangeRateProvider::class);

    //     $currencyRepo->method('findByCode')
    //                  ->willReturnOnConsecutiveCalls($gbp, $eur);

    //     $provider->method('fetchExchangeRatesByCurrency')->willReturn($exchangeRateListData);

    //     $exchangeRateRepo->method('findExistingExchangeRate')
    //                      ->willReturn($exchangeRate);

    //     $exchangeRateRepo->expects($this->once())
    //                       ->method('update')
    //                       ->willReturn($exchangeRate);

    //     $service = new ExchangeRateService($provider, $currencyRepo, $exchangeRateRepo);

    //     $service->storeLatestExchangeRates('GBP');
    // }
}