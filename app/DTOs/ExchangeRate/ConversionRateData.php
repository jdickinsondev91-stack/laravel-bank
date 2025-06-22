<?php 

namespace App\DTOs\ExchangeRate;

class ConversionRateData
{
    public readonly string $currencyCode;
    public readonly float $rate;

    public static function fromApiResponse(array $response): self
    {
        $dto = new self();
        $dto->currencyCode = $response['currency_code'];
        $dto->rate = (float) $response['rate'];

        return $dto;
    }

    public function toArray(): array
    {
        return [
            'currency_code' => $this->currencyCode,
            'rate' => $this->rate,
        ];
    }
}