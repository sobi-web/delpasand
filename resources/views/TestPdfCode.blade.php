<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8"/>
    <link rel="icon" type="image/svg+xml" href="{{asset('favicon.ico')}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>صفحه تمرین</title>
    @vite('resources/css/app.css')

    <style>
        /* ---------- حالت چاپ ---------- */
        @media print {
            /* از محدودیت حداکثر عرض Tailwind خلاص شو */
            .max-w-6xl,
            .max-w-5xl,
            .max-w-7xl {
                max-width: 100% !important;
                width: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
            }

            /* کل main در حالت چاپ تمام عرض برگه را بگیرد */
            main {
                max-width: 100% !important;
                width: 100% !important;
                margin: 0 auto !important;
                padding: 0 !important;
            }

            /* اجبار دو ستونه */
            section.grid {
                display: grid !important;
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 12px !important;
                width: 100% !important;
            }

            /* کارت‌های روز */
            article {
                page-break-inside: avoid !important;
                break-inside: avoid !important;
                background: white !important;
                border: 1px solid #ddd !important;
                border-radius: 8px !important;
                padding: 10px !important;
            }

            /* رفع فاصله زیاد اطراف تصویر */
            img {
                max-width: 100% !important;
                height: auto !important;
            }

            /* عناوین و هدر کوچک‌تر برای فیت دو ستون */
            h1,h2,h3 {
                margin-top: 0;
                margin-bottom: 0.4rem;
                page-break-after: avoid !important;
            }
            article, .day-card {
                page-break-inside: avoid !important;
            }
        }
    </style>

</head>

<body>
<main class="max-w-6xl mx-auto p-6 lg:p-10">
    <section class="bg-white rounded-2xl shadow-md p-6 lg:p-10 mb-8">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div>
                <h1 class="text-2xl lg:text-3xl font-semibold">برنامهٔ تمرینی:{{$program->title}}</h1>
                <p class="mt-1 text-sm text-gray-500"> مدت دوره: {{$program->week_count}} هفته</p>
            </div>

            <div class="text-right">
                <div class="text-sm text-gray-500">مراجع:</div>
                <div class="mt-1 font-medium">{{$program->customer}}</div>
            </div>
        </div>

        <div class="mt-6 border-t pt-4 text-gray-700">
            <p>
                توضیحات برنامه: {{$program->description}}
            </p>
        </div>
    </section>

    <section class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        @foreach($program->days as $day)
            <article class="bg-white rounded-2xl shadow p-5">
                <header class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold">{{
$dayName = match ($day->day_of_week) {
    0 => 'شنبه',
    1 => 'یکشنبه',
    2 => 'دوشنبه',
    3 => 'سه‌شنبه',
    4 => 'چهارشنبه',
    5 => 'پنج‌شنبه',
    6 => 'جمعه',
    default => 'نامشخص',
}
}}</h2>
                    <span class="text-sm text-gray-500">{{$day->title}}</span>
                </header>
                @foreach($day->exercises as  $dayExercise)
                    @php

                        $exercise = $dayExercise->exercise ;

                        $sets = $dayExercise->sets ;


                    @endphp
                    @if($exercise )
                        <div class="space-y-4">
                            <div class="flex flex-col lg:flex-row items-stretch gap-4 bg-gray-50 rounded-lg p-4">
                                <img src="@if($exercise->image){{asset('storage/'. $exercise->image)}}@else https://placehold.co/280x180?text=1 @endif"
                                     alt="تصویر تمرین" class="w-full lg:w-44 h-36 object-cover rounded-lg shrink-0"/>

                                <div class="flex-1">
                                    <div class="flex items-start justify-between">
                                        <h3 class="font-semibold text-md">{{$exercise->name}}</h3>
                                        <span class="text-sm text-gray-500">سطح: {{
$complexity = match ($exercise->skill_complexity) {
    "Beginner" => 'مبتدی',
    "Advanced" => 'پیشرفته',
    "Intermediate" => 'متوسط',

    default => 'نامشخص',
}
}}</span>
                                    </div>
                                    @foreach($sets as $set)


                                        <div class="mt-3 grid grid-cols-2 gap-2 md:grid-cols-4">
                                            <div class="text-sm">
                                                <div class="text-xs text-gray-500">ست</div>
                                                <div class="font-medium">{{$set->set_number}}</div>
                                            </div>

                                            <div class="text-sm">
                                                <div class="text-xs text-gray-500">تکرار</div>
                                                <div class="font-medium">{{$set->reps}}</div>
                                            </div>

                                            <div class="text-sm">
                                                <div class="text-xs text-gray-500">سرعت اجرا</div>
                                                <div class="font-medium">{{$set->tempo}}</div>
                                            </div>

                                            <div class="text-sm">
                                                <div class="text-xs text-gray-500">استراحت</div>
                                                <div class="font-medium">{{$set->rest_seconds}}</div>
                                            </div>
                                        </div>

                                        @if($set->note)

                                            <p class="mt-3 text-sm text-gray-600">نکته:

                                                {{$set->note}}

                                            </p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    @endif
                @endforeach
            </article>

        @endforeach


        <div class="lg:col-span-2 mt-4">
            <h3 class="text-lg font-semibold mb-3">روزهای خاص</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white rounded-2xl shadow p-4">
                    <div class="flex items-center justify-between">
                        <h4 class="font-medium">روز استراحت فعال</h4>
                        <span class="text-sm text-gray-500">Recovery</span>
                    </div>
                    <p class="mt-3 text-sm text-gray-600">پیاده‌روی سبک، کشش دینامیک، فومی رولینگ — فعال نگه داشتن عضلات
                        بدون
                        فشار زیاد.</p>
                </div>

                <div class="bg-white rounded-2xl shadow p-4">
                    <div class="flex items-center justify-between">
                        <h4 class="font-medium">تمرین هوازی</h4>
                        <span class="text-sm text-gray-500">Cardio</span>
                    </div>
                    <p class="mt-3 text-sm text-gray-600">دویدن 20-40 دقیقه یا دوچرخه‌سواری با شدت متغیر.</p>
                </div>

                <div class="bg-white rounded-2xl shadow p-4">
                    <div class="flex items-center justify-between">
                        <h4 class="font-medium">کشش و ریکاوری</h4>
                        <span class="text-sm text-gray-500">Mobility</span>
                    </div>
                    <p class="mt-3 text-sm text-gray-600">تمرینات کششی استاتیک، تمرکز روی مفاصل و بهبود دامنه حرکتی.</p>
                </div>
            </div>
        </div>
    </section>
</main>
</body>

</html>
