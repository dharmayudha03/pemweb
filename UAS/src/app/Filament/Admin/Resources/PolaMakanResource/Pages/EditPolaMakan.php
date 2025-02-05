<?php

namespace App\Filament\Admin\Resources\PolaMakanResource\Pages;

use App\Filament\Admin\Resources\PolaMakanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPolaMakan extends EditRecord
{
    protected static string $resource = PolaMakanResource::class;

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
