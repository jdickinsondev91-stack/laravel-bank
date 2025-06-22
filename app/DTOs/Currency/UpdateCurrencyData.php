<?php   

namespace App\DTOs\Currency;

class UpdateCurrencyData
{
    public string $id;
    public string $name;
    public string $code;
    public string $symbol;
    public int $decimalPlaces;

    public static function fromArray(array $data): self
    {
        $dto = new self();

        $dto->id = $data['id'] ?? '';
        $dto->name = $data['name'] ?? '';
        $dto->code = $data['code'] ?? '';
        $dto->symbol = $data['symbol'] ?? '';
        $dto->decimalPlaces = $data['decimal_places'] ?? 2;

        return $dto;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'symbol' => $this->symbol,
            'decimal_places' => $this->decimalPlaces,
        ];
    }
}