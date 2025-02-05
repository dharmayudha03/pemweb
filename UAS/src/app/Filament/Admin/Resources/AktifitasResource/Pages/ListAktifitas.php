<?php

namespace App\Filament\Admin\Resources\AktifitasResource\Pages;

use App\Filament\Admin\Resources\AktifitasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListAktifitas extends ListRecords
{
    protected static string $resource = AktifitasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTitle(): string|Htmlable
    {
        return 'Aktifitas';
    }
}
