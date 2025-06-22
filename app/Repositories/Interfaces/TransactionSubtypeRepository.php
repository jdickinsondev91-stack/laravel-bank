<?php 

namespace App\Repositories\Interfaces;

use App\DTOs\TransactionSubType\CreateTransactionSubtypeData;
use App\DTOs\TransactionSubtype\UpdateTransactionSubtypeData;
use App\Models\TransactionSubtype;
use Illuminate\Database\Eloquent\Collection;

interface TransactionSubtypeRepository 
{
    public function findAll(): Collection;

    public function findById(string $id): ?TransactionSubtype;

    public function create(CreateTransactionSubtypeData $data): TransactionSubtype;

    public function update(string $id, UpdateTransactionSubtypeData $data): ?TransactionSubtype;

    public function delete(string $id): bool;
} 