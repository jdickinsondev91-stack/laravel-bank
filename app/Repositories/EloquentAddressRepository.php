<?php

namespace App\Repositories;

use App\DTOs\Address\CreateAddressData;
use App\DTOs\Address\UpdateAddressData;
use App\Models\Address;
use App\Repositories\Interfaces\AddressRepository;
use Illuminate\Database\Eloquent\Collection;

class EloquentAddressRepository implements AddressRepository
{
    public function __construct(
        protected Address $model
    ) {}

    public function findAll(): Collection
    {
        return $this->model->all();
    }

    public function findById(string $id): ?Address
    {
        return $this->model->find($id);
    }

    public function create(CreateAddressData $data): Address
    {
        return $this->model->create($data->toArray());
    }

    public function update(string $id, UpdateAddressData $data): ?Address
    {
        $address = $this->findById($id);
        if ($address) {
            $address->update($data->toArray());
            return $address;
        }
        return null;
    }

    public function delete(string $id): bool
    {
        $address = $this->findById($id);
        if ($address) {
            return $address->delete();
        }
        return false;
    }
}