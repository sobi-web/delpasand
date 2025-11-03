<?php

namespace App\Filament\Resources\Programs\Programs\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use App\Models\Exercises\Exercise;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProgramForm
{
    protected static ?string $title = 'ساخت برنامه جدید';

    /**
     * ✅ متد استاندارد در فیلامنت جدید
     * از متد استاتیک configure(Form $form): Form استفاده می‌شود
     * و تمام schema درونش تعریف می‌گردد.
     */
    public static function configure(Schema $schema): Schema
    {
        return $schema

            ->schema([
                Section::make('Program Details')
                    ->columnSpanFull()
                    ->heading('جزئیات برنامه')
                    ->inlineLabel()
                    ->schema([
                        TextInput::make('title')
                            ->label('عنوان برنامه')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('description')
                            ->label('توضیحات')
                            ->rows(3),
                    ]),

                Section::make('Training Days')
                    ->columnSpanFull()
                    ->heading('روز برنامه')
                    ->schema([
                        Repeater::make('days')
                            ->relationship('days')
                            ->label('روز هفته')
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->label('عنوان روز'),

                                Select::make('day_of_week')
                                    ->options([
                                        '0' => 'شنبه',
                                        '1' => 'یکشنبه',
                                        '2' => 'دوشنبه',
                                        '3' => 'سه شنبه',
                                        '4' => 'چهارشنبه',
                                        '5' => 'پنجشنبه',
                                        '6' => 'جمعه',
                                    ])
                                    ->label('روز هفته'),

                                Repeater::make('exercises')
                                    ->relationship('exercises')
                                    ->label('تمرین ها')

                                    ->schema([
                                        // 🔹 فیلترهای بالا برای ابزار، گروه عضلات و نوع
                                        Select::make('tool_filter')
                                            ->label('فیلتر تمرین بر اساس ابزار ها')
                                            ->options(\App\Models\Exercises\Tool::query()->pluck('name', 'id'))
                                            ->reactive()
                                            ->dehydrated(false),

                                        Select::make('type_filter')
                                            ->label('فیلتر تمرین بر اساس نوع')
                                            ->options(\App\Models\Exercises\ExerciseType::query()->pluck('name', 'id'))
                                            ->reactive()
                                            ->dehydrated(false),

                                        Select::make('muscle_filter')
                                            ->label('فیلتر تمرین بر اساس گروه عضلانی')
                                            ->options(\App\Models\Exercises\MuscleGroup::query()->pluck('name', 'id'))
                                            ->reactive()
                                            ->dehydrated(false),

                                        Select::make('tag_filter')
                                            ->label('فیلتر تمرین بر اساس برچسب ها')
                                            ->options(\App\Models\Exercises\Tag::query()->pluck('name', 'id'))
                                            ->reactive()
                                            ->dehydrated(false),

                                        // 🔸 انتخاب تمرین با فیلترهای پویا
                                        Select::make('exercise_id')
                                            ->label('تمرین ها')
                                            ->searchable()
                                            ->getSearchResultsUsing(function (string $search, callable $get) {
                                                $query = \App\Models\Exercises\Exercise::query()
                                                    ->where('name', 'like', "%{$search}%");

                                                // همین فیلترها رو در حالت جستجو هم اعمال کن
                                                if ($toolId = $get('tool_filter')) {
                                                    $query->whereHas('tools', fn($q) => $q->where('tools.id', $toolId));
                                                }
                                                if ($typeId = $get('type_filter')) {
                                                    $query->whereHas('exerciseTypes', fn($q) => $q->where('exercise_types.id', $typeId));
                                                }
                                                if ($muscleId = $get('muscle_filter')) {
                                                    $query->whereHas('muscleGroups', fn($q) => $q->where('muscle_groups.id', $muscleId));
                                                }
                                                if ($tagId = $get('tag_filter')) {
                                                    $query->whereHas('tags', fn($q) => $q->where('tags.id', $tagId));
                                                }

                                                return $query->limit(50)->pluck('name', 'id');
                                            })
                                            ->getOptionLabelUsing(fn($value): ?string => \App\Models\Exercises\Exercise::find($value)?->name)
                                            ->reactive()
                                            ->required(),

                                        Repeater::make('sets')
                                            ->relationship('sets')
                                            ->label('اطلاعات ست تمرین')
                                            ->schema([
                                                TextInput::make('reps')
                                                    ->numeric()
                                                    ->label('تکرار'),

                                                TextInput::make('weight')
                                                    ->numeric()
                                                    ->label('وزن'),

                                                Textarea::make('notes')
                                                    ->rows(1)
                                                    ->label('تایم استراحت'),
                                            ]),
                                    ]),

                            ]),
                    ]),
            ]);
    }
}
