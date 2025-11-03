<?php

namespace App\Filament\Widgets;

use App\Models\Exercises\Exercise;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverviewWidget extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('تعداد کل کاربران', User::count())
                ->description('کاربران ثبت شده در سیستم')
                ->icon('heroicon-o-user-group')
                ->color('success'),

            Card::make('تعداد کل تمرین‌ها', Exercise::count())
                ->description('تمرین‌های ثبت شده')
                ->icon('heroicon-o-academic-cap')
                ->color('primary'),
        ];
    }
}
