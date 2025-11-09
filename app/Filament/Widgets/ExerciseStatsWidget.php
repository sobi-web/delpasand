<?php

namespace App\Filament\Widgets;

use App\Models\Exercises\Exercise;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ExerciseStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {

        return [
            Stat::make('تعداد کل تمرین ها', Exercise::count())
                ->icon('heroicon-o-light-bulb')
                ->color('success'),
        ];
    }


}
