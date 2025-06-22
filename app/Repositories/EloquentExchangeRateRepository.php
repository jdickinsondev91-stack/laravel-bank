<?php 

namespace App\Repositories;

use App\DTOs\ExchangeRate\CreateExchangeRateData;
use App\DTOs\ExchangeRate\UpdateExchangeRateData;
use App\Models\ExchangeRate;
use App\Repositories\Interfaces\ExchangeRateRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class EloquentExchangeRateRepository implements ExchangeRateRepository
{
    public function __construct(
        protected ExchangeRate $model
    ) {}

    public function findAll(): Collection
    {
        return $this->model->all();
    }

    public function findById(string $id): ?ExchangeRate
    {
        return $this->model->find($id);
    }

    public function findExistingExchangeRate(
        string $baseCurrencyId,
        string $targetCurrencyId,
        Carbon $rateDate
    ): ?ExchangeRate {

        return $this->model->where('base_currency_id', $baseCurrencyId)
            ->where('target_currency_id', $targetCurrencyId)
            ->whereBetween('rate_date', [
                (clone $rateDate)->startofDay(),
                (clone $rateDate)->endOfDay()
            ])
            ->first();
    }

    public function create(CreateExchangeRateData $data): ExchangeRate
    {
        return $this->model->create($data->toArray());
    }

    public function update(string $id, UpdateExchangeRateData $data): ?ExchangeRate
    {
        $exchangeRate = $this->findById($id);
        if ($exchangeRate) {
            $exchangeRate->update($data->toArray());
            return $exchangeRate;
        }
        return null;
    }

    public function delete(string $id): bool
    {
        $exchangeRate = $this->findById($id);
        if ($exchangeRate) {
            return $exchangeRate->delete();
        }
        return false;
    }
}