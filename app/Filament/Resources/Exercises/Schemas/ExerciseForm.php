<?php

namespace App\Filament\Resources\Exercises\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ExerciseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Select::make('skill_complexity')
                    ->options(['Beginner' => 'Beginner', 'Intermediate' => 'Intermediate', 'Advanced' => 'Advanced'])
                    ->required(),
                RichEditor::make('description')
                    ->json()
                    ->columnSpanFull()
                ,

                FileUpload::make('image')
                    ->image()
                    ->columnSpanFull()
                ,
                MultiSelect::make('exerciseTypes')

                    ->relationship('exerciseTypes', 'name')
                    ->label('Exercise Types'),

                MultiSelect::make('tools')

                    ->relationship('tools', 'name')
                    ->label('Required Tools'),

                MultiSelect::make('muscleGroups')
                    ->relationship('muscleGroups', 'name')
                    ->label('Target Muscle Groups'),

                MultiSelect::make('tags')
                    ->relationship('tags', 'name')
                    ->label('Tags'),


            ]);
    }
}
