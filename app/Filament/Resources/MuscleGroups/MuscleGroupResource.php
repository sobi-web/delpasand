<?php

namespace App\Filament\Resources\MuscleGroups;

use App\Filament\Resources\MuscleGroups\Pages\CreateMuscleGroup;
use App\Filament\Resources\MuscleGroups\Pages\EditMuscleGroup;
use App\Filament\Resources\MuscleGroups\Pages\ListMuscleGroups;
use App\Filament\Resources\MuscleGroups\Pages\ViewMuscleGroup;
use App\Filament\Resources\MuscleGroups\Schemas\MuscleGroupForm;
use App\Filament\Resources\MuscleGroups\Schemas\MuscleGroupInfolist;
use App\Filament\Resources\MuscleGroups\Tables\MuscleGroupsTable;
use App\Models\Exercise\MuscleGroup;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MuscleGroupResource extends Resource
{
    protected static ?string $model = MuscleGroup::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleGroup;

    protected static ?string $recordTitleAttribute = 'MuscleGroups';

    public static function form(Schema $schema): Schema
    {
        return MuscleGroupForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MuscleGroupInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MuscleGroupsTable::configure($table);
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
            'index' => ListMuscleGroups::route('/'),
            'create' => CreateMuscleGroup::route('/create'),
            'view' => ViewMuscleGroup::route('/{record}'),
            'edit' => EditMuscleGroup::route('/{record}/edit'),
        ];
    }
}
