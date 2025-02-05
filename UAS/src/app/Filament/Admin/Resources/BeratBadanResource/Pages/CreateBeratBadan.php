<?php

namespace App\Filament\Admin\Resources\BeratBadanResource\Pages;

use App\Filament\Admin\Resources\BeratBadanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBeratBadan extends CreateRecord
{
    protected static string $resource = BeratBadanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
