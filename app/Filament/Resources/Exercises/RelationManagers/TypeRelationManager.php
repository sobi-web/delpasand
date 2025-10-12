<?php

namespace App\Filament\Resources\Exercises\RelationManagers;

use App\Filament\Resources\Types\ExerciseTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class TypeRelationManager extends RelationManager
{
    protected static string $relationship = 'Type';

    protected static ?string $relatedResource = ExerciseTypeResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
