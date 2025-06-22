<?php 

namespace App\Repositories;

use App\DTOs\TransactionType\CreateTransactionTypeData;
use App\DTOs\TransactionType\UpdateTransactionTypeData;
use App\Models\TransactionType;
use App\Repositories\Interfaces\TransactionTypeRepository;
use Illuminate\Database\Eloquent\Collection;

class EloquentTransactionTypeRepository implements TransactionTypeRepository
{
    public function __construct(
        protected TransactionType $model
    ) {}

    public function findAll(): Collection
    {
        return $this->model->all();
    }

    public function findById(string $id): ?TransactionType
    {
        return $this->model->find($id);
    }

    public function create(CreateTransactionTypeData $data): TransactionType
    {
        return $this->model->create($data);
    }

    public function update(string $id, UpdateTransactionTypeData $data): ?TransactionType
    {
        $transactionType = $this->findById($id);
        if ($transactionType) {
            $transactionType->update($data->toArray());
            return $transactionType;
        }
        return null;
    }

    public function delete(string $id): bool
    {
        $transactionType = $this->findById($id);
        if ($transactionType) {
            return $transactionType->delete();
        }
        return false;
    }
}