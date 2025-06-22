<?php 

namespace App\Repositories\Interfaces;

use App\DTOs\ExchangeRate\CreateExchangeRateData;
use App\DTOs\ExchangeRate\UpdateExchangeRateData;
use App\Models\ExchangeRate;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

interface ExchangeRateRepository
{
    public function findAll(): Collection;

    public function findById(string $id): ?ExchangeRate;

    public function findExistingExchangeRate(
        string $baseCurrencyId,
        string $targetCurrencyId,
        Carbon $rateDate
    ): ?ExchangeRate;

    public function create(CreateExchangeRateData $data): ExchangeRate;

    public function update(string $id, UpdateExchangeRateData $data): ?ExchangeRate;

    public function delete(string $id): bool;
}