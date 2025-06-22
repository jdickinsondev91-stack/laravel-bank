<?php 

namespace App\Repositories\Interfaces;

use App\DTOs\User\CreateUserData;
use App\DTOs\User\UpdateUserData;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepository
{
    public function findAll(): Collection;

    public function findById(string $id): ?User;

    public function create(CreateUserData $data): User;

    public function update(string $id, UpdateUserData $data): ?User;

    public function delete(string $id): bool;
}