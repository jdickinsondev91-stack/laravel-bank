<?php 

namespace App\Repositories;

use App\DTOs\Currency\CreateCurrencyData;
use App\DTOs\Currency\UpdateCurrencyData;
use App\Models\Currency;
use App\Repositories\Interfaces\CurrencyRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class EloquentCurrencyRepository implements CurrencyRepository
{
    public function __construct(
        protected Currency $model
    ) {}

    public function findAll(): Collection
    {
        return $this->model->all();
    }

    public function findById(string $id): ?Currency
    {
        return $this->model->find($id);
    }

    public function findByCode(string $code): ?Currency
    {
        return $this->model->where('code', $code)->first();
    }

    public function create(CreateCurrencyData $data): Currency
    {
        return $this->model->create($data->toArray());
    }

    public function update(string $id, UpdateCurrencyData $data): ?Currency
    {
        $currency = $this->findById($id);
        if ($currency) {
            $currency->update($data->toArray());
            return $currency;
        }
        return null;
    }

    public function delete(string $id): bool
    {
        $currency = $this->findById($id);
        if ($currency) {
            return $currency->delete();
        }
        return false;
    }

    public function deleteMultiple(array $ids): void 
    {
        $this->model->whereIn('id', $ids)->delete();
    }

    public function getTableQuery(): Builder
    {
        return $this->model->query();
    }
}