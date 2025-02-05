<?php

namespace App\Filament\Admin\Resources\BeratBadanResource\Pages;

use App\Filament\Admin\Resources\BeratBadanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListBeratBadans extends ListRecords
{
    protected static string $resource = BeratBadanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTitle(): string|Htmlable
    {
        return 'Berat Badan';
    }
}
