<?php

namespace App\Filament\Widgets;

use App\Models\Programs\Program;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProgramStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('تعداد کل برنامه‌ها', Program::count())
                ->color('success'),
        ];
    }
}
