<?php

namespace App\Filament\Resources\Exercise\Exercises\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ExerciseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                ->label('نام'),
                Select::make('skill_complexity')
                    ->label('میزان سختی')
                    ->options(['Beginner' => 'مبتدی', 'Intermediate' => 'متوسط', 'Advanced' => 'سخت'])
                    ->required(),
                Textarea::make('description')
                    ->label('توضیحات')

                    ->columnSpanFull()
                ,

                FileUpload::make('image')
                    ->label('تصویر تمرین')
                    ->image()
                    ->directory('exercises')
                    ->visibility('public')
                    ->maxSize(2048) // 2MB
                    ->multiple(false),



                MultiSelect::make('exerciseTypes')
                   ->label('نوع تمرین')
                    ->relationship('exerciseTypes', 'name'),

                MultiSelect::make('tools')
                    ->label(' ابزار ها')
                    ->relationship('tools', 'name'),

                MultiSelect::make('muscleGroups')
                    ->label('گروه های عضلانی')
                    ->relationship('muscleGroups', 'name'),

                MultiSelect::make('tags')
                    ->label('برچسب ها ')
                    ->relationship('tags', 'name'),


            ]);
    }
}
