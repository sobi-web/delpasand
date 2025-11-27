<?php

namespace App\Filament\Resources\Programs\Programs\Schemas;

use App\Models\Exercises\ExerciseType;
use App\Models\Exercises\MuscleGroup;
use App\Models\Exercises\Tag;
use App\Models\Exercises\Tool;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use App\Models\Exercises\Exercise;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;

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




                        TextInput::make('customer')
                            ->label('نام مراجعه کننده')
                            ->required()

                            ->maxLength(255),

                        TextInput::make('week_count')
                            ->label('تعداد هفته اجرای برنامه')
                             ->required()
                        ->maxLength(255)
                        ->integer()
                        ->numeric(),

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
                                TextInput::make('title')
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
                                            ->options(fn() => Tool::hierarchy())
                                            ->reactive()
                                            ->dehydrated(false),

                                        Select::make('type_filter')
                                            ->label('فیلتر تمرین بر اساس نوع')
                                            ->options(fn() => ExerciseType::hierarchy())
                                            ->reactive()
                                            ->dehydrated(false),

                                        Select::make('muscle_filter')
                                            ->label('فیلتر تمرین بر اساس گروه عضلانی')
                                            ->options(fn() => MuscleGroup::hierarchy())
                                            ->reactive()
                                            ->dehydrated(false),

                                        Select::make('tag_filter')
                                            ->label('فیلتر تمرین بر اساس برچسب ها')
                                            ->options(fn() => Tag::hierarchy())
                                            ->reactive()
                                            ->dehydrated(false),

                                        // 🔸 انتخاب تمرین با فیلترهای پویا
                                        Select::make('exercise_id')
                                            ->label('تمرین‌ها')
                                            ->options(function (callable $get) {
                                                $query = Exercise::query();

                                                // --- فیلترها ---
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

                                                // ---- تولید label HTML با عکس ----
                                                return $query->with(['tags', 'muscleGroups', 'exerciseTypes', 'tools'])
                                                    ->get()->mapWithKeys(function ($ex) {
                                                    $url = Storage::disk('public')->exists($ex->image)
                                                        ? asset('storage/' . $ex->image)
                                                        : 'https://placehold.co/600x400/EEE/31343C?font=pt-sans&text=Exercise';
                                                    $tags = $ex->tags->pluck('name')->join(', ');
                                                    $muscles = $ex->muscleGroups->pluck('name')->join(', ');
                                                    $types = $ex->exerciseTypes->pluck('name')->join(', ');
                                                    $tools = $ex->tools->pluck('name')->join(', ');

                                                    $html = '
            <div style="
                display:flex;
                flex-wrap:wrap;
                align-items:center;
                gap:12px;
                line-height:1.4;
            ">
                <img src="'.$url.'"
                    style="width:85px;height:85px;object-fit:cover;border-radius:6px;">

                <strong>'.$ex->name.'</strong>

                <span style="font-size:12px;color:#555;margin-right:10px;">
                    برچسب: '.$tags.'
                </span>

                <span style="font-size:12px;color:#555;margin-right:10px;">
                    گروه عضلانی: '.$muscles.'
                </span>

                <span style="font-size:12px;color:#555;margin-right:10px;">
                    نوع تمرین: '.$types.'
                </span>

                <span style="font-size:12px;color:#555;margin-right:10px;">
                    ابزار ها : '.$tools.'
                </span>

            </div>
        ';

                                                    return [$ex->id => $html];
                                                })->toArray();
                                            })
                                            ->allowHtml()   // مهم
                                            ->columns(1)
                                            ->native(false)   // مهم → ظاهر Radio / گزینه‌های زیبا
                                            ->reactive()
                                        ,

                                        Repeater::make('sets')
                                            ->relationship('sets')
                                            ->label('اطلاعات ست تمرین')
                                            ->schema([
                                                TextInput::make('set_number')
                                                    ->label('تعداد ست'),

                                                TextInput::make('reps')
                                                    ->label('تکرار'),


                                                Textarea::make('tempo')
                                                    ->rows(1)
                                                    ->label('سرعت اجرا'),

                                                TextInput::make('rest_seconds')
                                                    ->label('تایم استراحت'),
                                                TextInput::make('note')
                                                    ->label('نکته اجرای تمرین'),
                                            ]),
                                    ]),

                            ]),
                    ]),
            ]);
    }
}
