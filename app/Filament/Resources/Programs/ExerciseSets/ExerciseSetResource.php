<?php

namespace App\Filament\Resources\Programs\ExerciseSets;

use App\Filament\Resources\Programs\ExerciseSets\Pages\CreateExerciseSet;
use App\Filament\Resources\Programs\ExerciseSets\Pages\EditExerciseSet;
use App\Filament\Resources\Programs\ExerciseSets\Pages\ListExerciseSets;
use App\Filament\Resources\Programs\ExerciseSets\Pages\ViewExerciseSet;
use App\Filament\Resources\Programs\ExerciseSets\Schemas\ExerciseSetForm;
use App\Filament\Resources\Programs\ExerciseSets\Schemas\ExerciseSetInfolist;
use App\Filament\Resources\Programs\ExerciseSets\Tables\ExerciseSetsTable;
use App\Models\Programs\ExerciseSet;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ExerciseSetResource extends Resource
{
    protected static ?string $model = ExerciseSet::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Exercise Set';

    public static function form(Schema $schema): Schema
    {
        return ExerciseSetForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ExerciseSetInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExerciseSetsTable::configure($table);
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
            'index' => ListExerciseSets::route('/'),
            'create' => CreateExerciseSet::route('/create'),
            'view' => ViewExerciseSet::route('/{record}'),
            'edit' => EditExerciseSet::route('/{record}/edit'),
        ];
    }
}
