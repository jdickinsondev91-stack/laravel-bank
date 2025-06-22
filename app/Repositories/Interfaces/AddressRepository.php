<?php 

namespace App\Repositories\Interfaces;

use App\DTOs\Address\CreateAddressData;
use App\DTOs\Address\UpdateAddressData;
use App\Models\Address;
use Illuminate\Database\Eloquent\Collection;

interface AddressRepository
{
    public function findAll(): Collection;
    
    public function findById(string $id): ?Address;

    public function create(CreateAddressData $data): Address;

    public function update(string $id, UpdateAddressData $data): ?Address;

    public function delete(string $id): bool;
}  