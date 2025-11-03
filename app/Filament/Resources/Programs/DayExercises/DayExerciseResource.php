<?php

namespace App\Filament\Resources\Programs\DayExercises;

use App\Filament\Resources\Programs\DayExercises\Pages\CreateDayExercise;
use App\Filament\Resources\Programs\DayExercises\Pages\EditDayExercise;
use App\Filament\Resources\Programs\DayExercises\Pages\ListDayExercises;
use App\Filament\Resources\Programs\DayExercises\Pages\ViewDayExercise;
use App\Filament\Resources\Programs\DayExercises\Schemas\DayExerciseForm;
use App\Filament\Resources\Programs\DayExercises\Schemas\DayExerciseInfolist;
use App\Filament\Resources\Programs\DayExercises\Tables\DayExercisesTable;
use App\Models\Programs\DayExercise;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DayExerciseResource extends Resource
{
    protected static ?string $model = DayExercise::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Day Exercise';

    public static function form(Schema $schema): Schema
    {
        return DayExerciseForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DayExerciseInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DayExercisesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDayExercises::route('/'),
            'create' => CreateDayExercise::route('/create'),
            'view' => ViewDayExercise::route('/{record}'),
            'edit' => EditDayExercise::route('/{record}/edit'),
        ];
    }
}
