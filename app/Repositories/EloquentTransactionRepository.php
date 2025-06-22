<?php 

namespace App\Repositories;

use App\DTOs\Transaction\CreateTransactionData;
use App\DTOs\Transaction\UpdateTransactionData;
use App\Models\Transaction;
use App\Repositories\Interfaces\TransactionRepository;
use Illuminate\Database\Eloquent\Collection;

class EloquentTransactionRepository implements TransactionRepository
{
    public function __construct(
        protected Transaction $model
    ) { }

    public function findAll(): Collection
    {
        return $this->model->all();
    }

    public function findById(string $id): ?Transaction
    {
        return $this->model->find($id);
    }

    public function create(CreateTransactionData $data): Transaction
    {
        return $this->model->create($data->toArray());
    }

    public function update(string $id, UpdateTransactionData $data): ?Transaction
    {
        $transaction = $this->findById($id);
        if ($transaction) {
            $transaction->update($data->toArray());
            return $transaction;
        }
        return null;
    }

    public function delete(string $id): bool
    {
        $transaction = $this->findById($id);
        if ($transaction) {
            return $transaction->delete();
        }
        return false;
    }
}