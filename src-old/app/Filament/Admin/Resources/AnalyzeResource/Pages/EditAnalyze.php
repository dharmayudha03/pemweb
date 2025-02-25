<?php

namespace App\Filament\Admin\Resources\AnalyzeResource\Pages;

use App\Filament\Admin\Resources\AnalyzeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAnalyze extends EditRecord
{
    protected static string $resource = AnalyzeResource::class;

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
