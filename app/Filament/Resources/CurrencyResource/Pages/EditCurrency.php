<?php

namespace App\Filament\Resources\CurrencyResource\Pages;

use App\DTOs\Currency\UpdateCurrencyData;
use App\Filament\Resources\CurrencyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Repositories\Interfaces\CurrencyRepository;
use Illuminate\Database\Eloquent\Model;

class EditCurrency extends EditRecord
{
    protected static string $resource = CurrencyResource::class;

    protected CurrencyRepository $currencyRepository;

    public function __construct()
    {
        $this->currencyRepository = app(CurrencyRepository::class);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $data = UpdateCurrencyData::fromArray($data);
        $data->id = $record->id;

        return $this->currencyRepository->update($record->id, $data);
    }
}
