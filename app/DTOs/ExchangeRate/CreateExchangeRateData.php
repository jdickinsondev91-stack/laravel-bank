<?php 

namespace App\DTOs\ExchangeRate;

class CreateExchangeRateData
{
    public string $fromCurrencyId;
    public string $toCurrencyId;
    public float $rate;
    public string $rateDate;

    public static function fromArray(array $data): self
    {
        $dto = new self();

        $dto->fromCurrencyId = $data['base_currency_id'] ?? '';
        $dto->toCurrencyId = $data['target_currency_id'] ?? '';
        $dto->rate = $data['rate'] ?? 0.0;
        $dto->rateDate = $data['rate_date'] ?? date('Y-m-d');

        return $dto;
    }

    public function toArray(): array
    {
        return [
            'base_currency_id' => $this->fromCurrencyId,
            'target_currency_id' => $this->toCurrencyId,
            'rate' => $this->rate,
            'rate_date' => $this->rateDate,
        ];
    }  
}