<?php 

namespace App\DTOs\TransactionSubtype;

class CreateTransactionSubtypeData
{
    public string $name;
    public string $slug;
    public string $transactionTypeId;

    public static function fromArray(array $data): self
    {
        $dto = new self();

        $dto->name = $data['name'] ?? '';
        $dto->slug = $data['slug'] ?? '';
        $dto->transactionTypeId = $data['transaction_type_id'] ?? '';

        return $dto;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'transaction_type_id' => $this->transactionTypeId,
        ];
    }
}   