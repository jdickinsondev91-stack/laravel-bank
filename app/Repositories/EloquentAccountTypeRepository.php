<?php 

namespace App\Repositories;

use App\DTOs\AccountType\CreateAccountTypeData;
use App\DTOs\AccountType\UpdateAccountTypeData;
use App\Models\AccountType;
use App\Repositories\Interfaces\AccountTypeRepository;

;
use Illuminate\Database\Eloquent\Collection;

class EloquentAccountTypeRepository implements AccountTypeRepository
{
    public function __construct(
        protected AccountType $model
    ) {}

    public function findAll(): Collection
    {
        return $this->model->all();
    }

    public function findById(string $id): ?AccountType
    {
        return $this->model->find($id);
    }

    public function create(CreateAccountTypeData $data): AccountType
    {
        return $this->model->create($data);
    }

    public function update(string $id, UpdateAccountTypeData $data): ?AccountType
    {
        $accountType = $this->findById($id);
        if ($accountType) {
            $accountType->update($data->toArray());
            return $accountType;
        }
        return null;
    }

    public function delete(string $id): bool
    {
        $accountType = $this->findById($id);
        if ($accountType) {
            return $accountType->delete();
        }
        return false;
    }
}