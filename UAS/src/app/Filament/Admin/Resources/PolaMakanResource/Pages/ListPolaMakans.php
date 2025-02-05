<?php

namespace App\Filament\Admin\Resources\PolaMakanResource\Pages;

use App\Filament\Admin\Resources\PolaMakanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListPolaMakans extends ListRecords
{
    protected static string $resource = PolaMakanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTitle(): string|Htmlable
    {
        return 'Pola Makan';
    }
}
