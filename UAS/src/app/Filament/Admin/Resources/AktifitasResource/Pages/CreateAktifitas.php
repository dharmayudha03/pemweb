<?php

namespace App\Filament\Admin\Resources\AktifitasResource\Pages;

use App\Filament\Admin\Resources\AktifitasResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAktifitas extends CreateRecord
{
    protected static string $resource = AktifitasResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
