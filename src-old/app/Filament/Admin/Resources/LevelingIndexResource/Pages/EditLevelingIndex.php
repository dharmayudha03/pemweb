<?php

namespace App\Filament\Admin\Resources\LevelingIndexResource\Pages;

use App\Filament\Admin\Resources\LevelingIndexResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLevelingIndex extends EditRecord
{
    protected static string $resource = LevelingIndexResource::class;

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
