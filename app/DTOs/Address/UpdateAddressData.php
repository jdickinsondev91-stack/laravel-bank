<?php

namespace App\DTOs\Address;

class UpdateAddressData
{
    public string $id;
    public string $userId;
    public string $line1;
    public ?string $line2 = null;
    public ?string $line3 = null;
    public string $town;
    public ?string $county = null;
    public string $postcode;
    public bool $isCurrent = false;

    public static function fromArray(array $data): self
    {
        $dto = new self();

        $dto->id = $data['id'] ?? '';
        $dto->userId = $data['user_id'] ?? '';
        $dto->line1 = $data['line_1'] ?? '';
        $dto->line2 = $data['line_2'] ?? null;
        $dto->line3 = $data['line_3'] ?? null;
        $dto->town = $data['town'] ?? '';
        $dto->county = $data['county'] ?? null;
        $dto->postcode = $data['postcode'] ?? '';
        $dto->isCurrent = $data['is_current'] ?? false;

        return $dto;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->userId,
            'line_1' => $this->line1,
            'line_2' => $this->line2,
            'line_3' => $this->line3,
            'town' => $this->town,
            'county' => $this->county,
            'postcode' => $this->postcode,
            'is_current' => $this->isCurrent,
        ];
    }
}