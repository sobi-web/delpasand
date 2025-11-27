<?php

namespace App\Filament\Resources\Exercise\Exercises\Schemas;

use App\Models\Exercises\ExerciseType;
use App\Models\Exercises\MuscleGroup;
use App\Models\Exercises\Tag;
use App\Models\Exercises\Tool;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;

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
                    ->image()
                    ->directory('exercises')
                    ->disk('public')
                    ->visibility('public')
                    ->label('تصویر تمرینض')
                    ->columnSpanFull(),

                MultiSelect::make('exerciseTypes')
                    ->label('نوع تمرین')
                    ->relationship('exerciseTypes', 'name')
                    ->options(fn() => ExerciseType::hierarchy())
                    ->preload()
                    ->required()
                    ->createOptionForm([
                        TextInput::make('name')->label('نام')->required(),
                        Select::make('parent_id')
                            ->relationship('parent', 'name')
                            ->options(fn() => ExerciseType::hierarchy())
                            ->preload()
                            ->label('دسته اصلی')
                            ->searchable()
                            ->nullable()
                    ]),


                MultiSelect::make('tools')
                    ->label(' ابزار ها')
                    ->relationship('tools', 'name')
                    ->searchable()
                    ->options(fn() => Tool::hierarchy())
                    ->preload()
                    ->required()
                    ->createOptionForm([
                        TextInput::make('name')->label('نام')->required(),
                        Select::make('parent_id')
                            ->relationship('parent', 'name')
                            ->options(fn() => Tool::hierarchy())
                            ->preload()
                            ->label('دسته اصلی')
                            ->searchable()
                            ->nullable()
                    ])

                ,


                MultiSelect::make('muscleGroups')
                    ->label('گروه های عضلانی')
                    ->relationship('muscleGroups', 'name')
                    ->options(fn() => MuscleGroup::hierarchy())
                    ->preload()
                    ->searchable()
                    ->required()
                    ->createOptionForm([
                        TextInput::make('name')->label('نام')->required(),
                        Select::make('parent_id')
                            ->relationship('parent', 'name')
                            ->options(fn() => MuscleGroup::hierarchy())
                            ->preload()
                            ->label('دسته اصلی')
                            ->searchable()
                            ->nullable()
                    ]),


                MultiSelect::make('tags')
                    ->label('برچسب ها ')
                    ->relationship('tags', 'name')
                    ->options(fn() => Tag::hierarchy())
                    ->preload()
                    ->searchable()
                    ->required()
                ->createOptionForm([
                    TextInput::make('name')->label('نام')->required(),
                    Select::make('parent_id')
                        ->relationship('parent', 'name')
                        ->options(fn() => Tag::hierarchy())
                        ->preload()
                        ->label('دسته اصلی')
                        ->searchable()
                        ->nullable()
                ])
                ,


            ]);
    }
}
