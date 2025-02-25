<?php

namespace App\Filament\Admin\Resources\LevelingIndexResource\Pages;

use App\Filament\Admin\Resources\LevelingIndexResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLevelingIndex extends CreateRecord
{
    protected static string $resource = LevelingIndexResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
