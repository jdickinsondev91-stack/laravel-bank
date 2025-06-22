<?php 

namespace App\DTOs\User;

class CreateUserData
{
    public string $firstName;
    public string $lastName;
    public string $phoneNumber;
    public string $email;

    public static function fromArray(array $data): self
    {
        $dto = new self();

        $dto->firstName = $data['first_name'] ?? '';
        $dto->lastName = $data['last_name'] ?? '';
        $dto->phoneNumber = $data['phone_number'] ?? '';
        $dto->email = $data['email'] ?? '';

        return $dto;
    }

    public function toArray(): array
    {
        return [
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'phone_number' => $this->phoneNumber,
            'email' => $this->email,
        ];
    }
}