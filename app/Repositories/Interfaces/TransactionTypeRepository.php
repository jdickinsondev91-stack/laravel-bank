<?php 

namespace App\Repositories\Interfaces;

use App\DTOs\TransactionType\CreateTransactionTypeData;
use App\DTOs\TransactionType\UpdateTransactionTypeData;
use App\Models\TransactionType;
use Illuminate\Database\Eloquent\Collection;

interface TransactionTypeRepository
{
    public function findAll(): Collection;

    public function findById(string $id): ?TransactionType;

    public function create(CreateTransactionTypeData $data): TransactionType;

    public function update(string $id, UpdateTransactionTypeData $data): ?TransactionType;

    public function delete(string $id): bool;
}