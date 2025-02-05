<?php

namespace App\Filament\Admin\Resources\PolaMakanResource\Pages;

use App\Filament\Admin\Resources\PolaMakanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePolaMakan extends CreateRecord
{
    protected static string $resource = PolaMakanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
