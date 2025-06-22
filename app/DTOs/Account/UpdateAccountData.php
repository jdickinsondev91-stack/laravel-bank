<?php 

namespace App\DTOs\Account;

class UpdateAccountData
{
    public string $id;
    public string $currencyId;
    public string $accountTypeId;
    public string $sortCode;
    public int $balance;
    public bool $open;

    public static function fromArray(array $data): self
    {
        $dto = new self();

        $dto->id = $data['id'] ?? '';
        $dto->currencyId = $data['currency_id'] ?? '';
        $dto->accountTypeId = $data['account_type_id'] ?? '';
        $dto->sortCode = $data['sort_code'] ?? '';
        $dto->balance = $data['balance'] ?? 0;
        $dto->open = $data['open'] ?? true;

        return $dto;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'currency_id' => $this->currencyId,
            'account_type_id' => $this->accountTypeId,
            'sort_code' => $this->sortCode,
            'balance' => $this->balance,
            'open' => $this->open,
        ];
    }
}