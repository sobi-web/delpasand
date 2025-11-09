<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\ExerciseStatsWidget;
use App\Filament\Widgets\ProgramStatsWidget;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Widgets\Widget;

class Dashboard extends BaseDashboard
{
    use BaseDashboard\Concerns\HasFiltersForm;

    public function getWidgets(): array
    {
        return [
            // هر دو ویجت را مستقیماً در آرایه قرار می‌دهیم.
            // Filament این دو را در یک ردیف با استفاده از چیدمان پیش‌فرض خود (که معمولاً 2 ستونی است) نمایش می‌دهد.
            ProgramStatsWidget::class,
            ExerciseStatsWidget::class,

        ];


    }

}
