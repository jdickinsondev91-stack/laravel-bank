<?php 

namespace App\DTOs\User;

class UpdateUserData 
{
    public string $id;
    public string $firstName;
    public string $lastName;
    public string $phoneNumber;
    public string $email;

    public static function fromArray(array $data): self
    {
        $dto = new self();

        $dto->id = $data['id'] ?? '';
        $dto->firstName = $data['first_name'] ?? '';
        $dto->lastName = $data['last_name'] ?? '';
        $dto->phoneNumber = $data['phone_number'] ?? '';
        $dto->email = $data['email'] ?? '';

        return $dto;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'phone_number' => $this->phoneNumber,
            'email' => $this->email,
        ];
    }
}