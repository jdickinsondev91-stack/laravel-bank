<?php 

namespace App\DTOs\AccountType;

class UpdateAccountTypeData
{
    public string $id;
    public string $name;
    public string $slug;

    public static function fromArray(array $data): self
    {
        $dto = new self();

        $dto->id = $data['id'] ?? '';
        $dto->name = $data['name'] ?? '';
        $dto->slug = $data['slug'] ?? '';

        return $dto;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
        ];
    }
}   