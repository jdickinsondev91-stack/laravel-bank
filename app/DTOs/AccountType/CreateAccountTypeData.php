<?php 

namespace App\DTOs\AccountType;

class CreateAccountTypeData
{
    public string $name;
    public string $slug;

    public static function fromArray(array $data): self
    {
        $dto = new self();

        $dto->name = $data['name'] ?? '';
        $dto->slug = $data['slug'] ?? '';

        return $dto;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
        ];
    }
}