<?php

namespace App\Filament\Resources\CurrencyResource\Pages;

use App\Filament\Resources\CurrencyResource;
use App\Repositories\Interfaces\CurrencyRepository;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListCurrencies extends ListRecords
{
    protected static string $resource = CurrencyResource::class;

    protected CurrencyRepository $currencyRepository;

    public function boot(CurrencyRepository $currencyRepository): void 
    {
        $this->currencyRepository = $currencyRepository;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableQuery(): ?Builder
    {
        return $this->currencyRepository->getTableQuery();
    }
}
