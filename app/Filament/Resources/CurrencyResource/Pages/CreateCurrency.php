<?php

namespace App\Filament\Resources\CurrencyResource\Pages;

use App\DTOs\Currency\CreateCurrencyData;
use App\Filament\Resources\CurrencyResource;
use App\Repositories\Interfaces\CurrencyRepository;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateCurrency extends CreateRecord
{
    protected static string $resource = CurrencyResource::class;

    protected CurrencyRepository $currencyRepository;

    public function __construct()
    {
        $this->currencyRepository = app(CurrencyRepository::class);
    }

    protected function handleRecordCreation(array $data): Model
    {
        $data = CreateCurrencyData::fromArray($data);

        return $this->currencyRepository->create($data);
    }
}
