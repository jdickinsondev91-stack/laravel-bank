<?php 

namespace App\Repositories;

use App\DTOs\TransactionSubType\CreateTransactionSubtypeData;
use App\DTOs\TransactionSubtype\UpdateTransactionSubtypeData;
use App\Models\TransactionSubtype;
use App\Repositories\Interfaces\TransactionSubtypeRepository;
use Illuminate\Database\Eloquent\Collection;

class EloquentTransactionSubtypeRepository implements TransactionSubtypeRepository
{
    public function __construct(
        protected TransactionSubtype $model
    ) {}

    public function findAll(): Collection
    {
        return $this->model->all();
    }

    public function findById(string $id): ?TransactionSubtype
    {
        return $this->model->find($id);
    }

    public function create(CreateTransactionSubtypeData $data): TransactionSubtype
    {
        return $this->model->create($data);
    }

    public function update(string $id, UpdateTransactionSubtypeData $data): ?TransactionSubtype
    {
        $transactionSubtype = $this->findById($id);
        if ($transactionSubtype) {
            $transactionSubtype->update($data->toArray());
            return $transactionSubtype;
        }
        return null;
    }

    public function delete(string $id): bool
    {
        $transactionSubtype = $this->findById($id);
        if ($transactionSubtype) {
            return $transactionSubtype->delete();
        }
        return false;
    }
}