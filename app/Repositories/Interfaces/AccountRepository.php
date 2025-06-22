<?php

namespace App\Repositories\Interfaces;

use App\DTOs\Account\CreateAccountData;
use App\DTOs\Account\UpdateAccountData;
use App\Models\Account;
use Illuminate\Database\Eloquent\Collection;

interface AccountRepository
{
    public function findByUserId(int $userId): Collection;

    public function findAll(): Collection;

    public function findById(string $id): ?Account;

    public function create(CreateAccountData $data): Account;

    public function update(string $id, UpdateAccountData $data): ?Account;

    public function delete(string $id): bool;
}   