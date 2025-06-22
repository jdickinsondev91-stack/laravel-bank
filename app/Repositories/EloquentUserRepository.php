<?php 

namespace App\Repositories;

use App\DTOs\User\CreateUserData;
use App\DTOs\User\UpdateUserData;
use App\Models\User;
use App\Repositories\Interfaces\UserRepository;
use Illuminate\Database\Eloquent\Collection;

class EloquentUserRepository implements UserRepository
{
    public function __construct(
        protected User $model
    ){}

    public function findAll(): Collection
    {
        return $this->model->all();
    }

    public function findById(string $id): ?User
    {
        return $this->model->find($id);
    }

    public function create(CreateUserData $data): User
    {
        return $this->model->create($data->toArray());
    }

    public function update(string $id, UpdateUserData $data): ?User
    {
        $user = $this->findById($id);
        if ($user) {
            $user->update($data->toArray());
            return $user;
        }
        return null;
    }

    public function delete(string $id): bool
    {
        $user = $this->findById($id);
        if ($user) {
            return $user->delete();
        }
        return false;
    }
}