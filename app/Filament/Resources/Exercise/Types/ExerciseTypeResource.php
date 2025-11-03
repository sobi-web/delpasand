<?php

namespace App\Filament\Resources\Exercise\Types;

use App\Filament\Resources\Exercise\Types\Pages\CreateExerciseType;
use App\Filament\Resources\Exercise\Types\Pages\EditExerciseType;
use App\Filament\Resources\Exercise\Types\Pages\ListExerciseTypes;
use App\Filament\Resources\Exercise\Types\Pages\ViewExerciseType;
use App\Filament\Resources\Exercise\Types\Schemas\ExerciseTypeForm;
use App\Filament\Resources\Exercise\Types\Schemas\ExerciseTypeInfolist;
use App\Filament\Resources\Exercise\Types\Tables\ExerciseTypesTable;
use App\Models\Exercises\ExerciseType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ExerciseTypeResource extends Resource
{
    protected static ?string $model = ExerciseType::class;

    protected static ?string $navigationLabel = 'Type';
//    protected static ?string $navigationGroup = '1' ;
    protected static string|null|\UnitEnum $navigationGroup = 'Exercises';
    protected static ?int $navigationSort = 1;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedInformationCircle;

    protected static ?string $recordTitleAttribute = 'Types';

    public static function form(Schema $schema): Schema
    {
        return ExerciseTypeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ExerciseTypeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExerciseTypesTable::configure($table);
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
            'index' => ListExerciseTypes::route('/'),
            'create' => CreateExerciseType::route('/create'),
            'view' => ViewExerciseType::route('/{record}'),
            'edit' => EditExerciseType::route('/{record}/edit'),
        ];
    }

//    public static function getNavigationGroup()
//    {
//
//    }



}
