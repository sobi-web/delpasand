<?php

namespace App\Filament\Resources\Exercise\Exercises\Schemas;

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

//                FileUpload::make('image')
//
//                    ->label('تصویر تمرین')
//                    ->image()
//                    ->directory('exercises')
//                    ->disk('local')
//                    ->visibility('public')
//                    ->maxSize(2048)
//                    ->storeFileNamesIn('attachment_file_names')// 2MB
//                   ,
                FileUpload::make('image')
                    ->label('فایل برنامه')
                    ->disk('public')
                    ->directory('programs') // داخل storage/app/public/programs
                    ->preserveFilenames()
                    ->getUploadedFileNameForStorageUsing(fn ($file) => time().'_'.$file->getClientOriginalName())
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $fullUrl = Storage::disk('public')->url($state);
                            $set('image', $fullUrl);
                        }
                    }),



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
