<?php

namespace App\DTOs\TransactionSubtype;

class UpdateTransactionSubtypeData
{
    public string $id;
    public string $name;
    public string $slug;
    public string $transactionTypeId;

    public static function fromArray(array $data): self
    {
        $dto = new self();

        $dto->id = $data['id'] ?? '';
        $dto->name = $data['name'] ?? '';
        $dto->slug = $data['slug'] ?? '';
        $dto->transactionTypeId = $data['transaction_type_id'] ?? '';

        return $dto;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'transaction_type_id' => $this->transactionTypeId,
        ];
    }
}  