<?php 

namespace App\Repositories;

use App\DTOs\Account\CreateAccountData;
use App\DTOs\Account\UpdateAccountData;
use App\Models\Account;
use App\Repositories\Interfaces\AccountRepository;
use Illuminate\Database\Eloquent\Collection;

class EloquentAccountRepository implements AccountRepository
{
    public function __construct(
        protected Account $model
    ) { }

    public function findByUserId(int $userId): Collection
    {
        return $this->model->where('user_id', $userId)->get();
    }

    public function findAll(): Collection
    {
        return $this->model->all();
    }

    public function findById(string $id): ?Account
    {
        return $this->model->find($id);
    }

    public function create(CreateAccountData $data): Account
    {
        return $this->model->create($data->toArray());
    }

    public function update(string $id, UpdateAccountData $data): ?Account
    {
        $account = $this->findById($id);
        if ($account) {
            $account->update($data->toArray());
            return $account;
        }
        return null;
    }

    public function delete(string $id): bool
    {
        $account = $this->findById($id);
        if ($account) {
            return $account->delete();
        }
        return false;
    }
}