<?php

namespace App\Filament\Admin\Widgets;

use App\Models\BeratBadan;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BeratBadanWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah User dengan Berat Badan 60-70 kg', BeratBadan::whereBetween('berat', [60, 70])->distinct('user_id')->count('user_id'))
                ->description('Total user dengan berat badan antara 60 hingga 70 kg')
                ->icon('heroicon-o-user-group')  // Bisa diganti sesuai keinginan
                ->color('success'),
        ];
    }
}
