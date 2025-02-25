<?php

namespace App\Filament\Admin\Resources\RecomendationResource\Pages;

use App\Filament\Admin\Resources\RecomendationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRecomendation extends EditRecord
{
    protected static string $resource = RecomendationResource::class;

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
