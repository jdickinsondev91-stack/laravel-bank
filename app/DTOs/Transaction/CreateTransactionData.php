<?php 

namespace App\DTOs\Transaction;

class CreateTransactionData
{
    public string $accountId;
    public string $transactionTypeId;
    public string $transactionSubtypeId;
    public string $exchangeRateId;
    public string $fromCurrencyId;
    public int $fromAmount;
    public string $toCurrencyId;
    public int $toAmount;
    public string $status;
    public ?string $reference;
    
    public static function fromArray(array $data): self
    {
        $dto = new self();

        $dto->accountId = $data['account_id'] ?? '';
        $dto->transactionTypeId = $data['transaction_type_id'] ?? '';
        $dto->transactionSubtypeId = $data['transaction_subtype_id'] ?? '';
        $dto->exchangeRateId = $data['exchange_rate_id'] ?? '';
        $dto->fromCurrencyId = $data['from_currency_id'] ?? '';
        $dto->fromAmount = (int) ($data['from_amount'] ?? 0);
        $dto->toCurrencyId = $data['to_currency_id'] ?? '';
        $dto->toAmount = (int) ($data['to_amount'] ?? 0);
        $dto->status = $data['status'] ?? 'pending';
        $dto->reference = $data['reference'] ?? null;

        return $dto;
    }

    public function toArray(): array
    {
        return [
            'account_id' => $this->accountId,
            'transaction_type_id' => $this->transactionTypeId,
            'transaction_subtype_id' => $this->transactionSubtypeId,
            'exchange_rate_id' => $this->exchangeRateId,
            'from_currency_id' => $this->fromCurrencyId,
            'from_amount' => $this->fromAmount,
            'to_currency_id' => $this->toCurrencyId,
            'to_amount' => $this->toAmount,
            'status' => $this->status,
            'reference' => $this->reference,
        ];
    }
}