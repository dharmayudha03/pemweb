<?php

namespace App\Filament\Admin\Resources\BeratBadanResource\Pages;

use App\Filament\Admin\Resources\BeratBadanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBeratBadan extends EditRecord
{
    protected static string $resource = BeratBadanResource::class;

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
