<?php

namespace App\DTOs\ExchangeRate;

class UpdateExchangeRateData
{
    public string $id;
    public string $fromCurrencyId;
    public string $toCurrencyId;
    public float $rate;
    public string $rateDate;

    public static function fromArray(array $data): self
    {
        $dto = new self();

        $dto->id = $data['id'] ?? '';
        $dto->fromCurrencyId = $data['from_currency_id'] ?? '';
        $dto->toCurrencyId = $data['to_currency_id'] ?? '';
        $dto->rate = $data['rate'] ?? 0.0;
        $dto->rateDate = $data['rate_date'] ?? date('Y-m-d');

        return $dto;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'from_currency_id' => $this->fromCurrencyId,
            'to_currency_id' => $this->toCurrencyId,
            'rate' => $this->rate,
            'rate_date' => $this->rateDate,
        ];
    }
}