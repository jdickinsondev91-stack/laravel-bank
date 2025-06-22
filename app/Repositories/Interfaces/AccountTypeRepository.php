<?php 

namespace App\Repositories\Interfaces;

use App\DTOs\AccountType\CreateAccountTypeData;
use App\DTOs\AccountType\UpdateAccountTypeData;
use App\Models\AccountType;
use Illuminate\Database\Eloquent\Collection;

interface AccountTypeRepository
{
    public function findAll(): Collection;

    public function findById(string $id): ?AccountType;

    public function create(CreateAccountTypeData $data): AccountType;

    public function update(string $id, UpdateAccountTypeData $data): ?AccountType;

    public function delete(string $id): bool;
}