<?php

namespace App\Filament\Resources\Exercise\Exercises;

use App\Filament\Resources\Exercise\Exercises\Pages\CreateExercise;
use App\Filament\Resources\Exercise\Exercises\Pages\EditExercise;
use App\Filament\Resources\Exercise\Exercises\Pages\ListExercises;
use App\Filament\Resources\Exercise\Exercises\Pages\ViewExercise;
use App\Filament\Resources\Exercise\Exercises\Schemas\ExerciseForm;
use App\Filament\Resources\Exercise\Exercises\Schemas\ExerciseInfolist;
use App\Filament\Resources\Exercise\Exercises\Tables\ExercisesTable;
use App\Models\Exercises\Exercise;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExerciseResource extends Resource
{
    protected static ?string $model = Exercise::class;
    protected static ?string $navigationLabel = 'تمرین ها';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedLightBulb;
    protected static string|null|\UnitEnum $navigationGroup = 'تمرین ها';
    protected static ?string $modelLabel = ' تمرین';
    protected static ?string $pluralModelLabel = ' تمرین ها';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ExerciseForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ExerciseInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExercisesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
//          TypeRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListExercises::route('/'),
            'create' => CreateExercise::route('/create'),
            'view' => ViewExercise::route('/{record}'),
            'edit' => EditExercise::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
