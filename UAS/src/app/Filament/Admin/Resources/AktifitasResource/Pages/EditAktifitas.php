<?php

namespace App\Filament\Admin\Resources\AktifitasResource\Pages;

use App\Filament\Admin\Resources\AktifitasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAktifitas extends EditRecord
{
    protected static string $resource = AktifitasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
