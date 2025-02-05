<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Aktifitas;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AktifitasWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah User Aktif', Aktifitas::distinct('user_id')->count('user_id'))
                ->description('Total user yang telah melakukan aktivitas')
                ->icon('heroicon-o-user-group')
                ->color('success'),
        ];
    }
}
