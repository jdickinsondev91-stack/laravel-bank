<?php 

namespace App\Repositories\Interfaces;

use App\DTOs\Transaction\CreateTransactionData;
use App\DTOs\Transaction\UpdateTransactionData;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Collection;

interface TransactionRepository
{
    public function findAll(): Collection;

    public function findById(string $id): ?Transaction;

    public function create(CreateTransactionData $data): Transaction;

    public function update(string $id,UpdateTransactionData $data): ?Transaction;

    public function delete(string $id): bool;
}