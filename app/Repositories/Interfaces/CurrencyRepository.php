<?php 

namespace App\Repositories\Interfaces;

use App\DTOs\Currency\CreateCurrencyData;
use App\DTOs\Currency\UpdateCurrencyData;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Collection;

interface CurrencyRepository
{
    public function findAll(): Collection;
  
    public function findById(string $id): ?Currency;

    public function findByCode(string $code): ?Currency;

    public function create(CreateCurrencyData $data): Currency;

    public function update(string $id, UpdateCurrencyData $data): ?Currency;

    public function delete(string $id): bool;
}