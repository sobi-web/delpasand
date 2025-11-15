<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>برنامه تمرینی – {{ $program->title }}</title>

    <style>
        @page {
            size: A4 portrait;
            margin: 15mm;
        }

        html, body {
            direction: rtl;
            font-family: 'Vazir', sans-serif;
            font-size: 13px;
            color: #111;
            margin: 0;
            padding: 0;
            width: 100%;
            background: #fff;
        }

        /* ---------- بخش عمومی ---------- */
        h1, h2, h3, h4 {
            margin: 0;
            padding: 0;
        }

        .program-header {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 14px;
            background: #fafafa;
        }

        /* ---------- ساختار کلی روزها ---------- */
        .days-wrapper {
            display: flex;
            flex-direction: column;
            gap: 18px;
            width: 100%;
        }

        /* هر روز خودش یک ستون کامل از صفحه است */
        .day-card {
            break-inside: avoid !important;
            page-break-inside: avoid !important;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 14px;
            background: #fff;
        }

        .day-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e5e5e5;
            margin-bottom: 8px;
            padding-bottom: 4px;
        }

        /* گرید تمرین‌ها درون هر روز: دو ستون */
        .exercise-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px 12px;
            width: 100%;
        }

        .exercise-card {
            break-inside: avoid !important;
            page-break-inside: avoid !important;
            border: 1px solid #eee;
            border-radius: 8px;
            padding: 8px;
            background: #fafafa;
        }

        .exercise-top {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: 6px;
        }

        .exercise-top img {
            width: 100%;
            height: 95px;
            object-fit: cover;
            border-radius: 6px;
        }

        .exercise-name {
            font-weight: 600;
            font-size: 13px;
        }

        .sets-table {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 4px;
            margin-top: 4px;
        }

        .sets-table div {
            font-size: 11px;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 2px 3px;
            text-align: center;
            background: #fff;
        }

        .note {
            font-size: 11px;
            color: #444;
            margin-top: 3px;
            line-height: 1.3;
        }

        /* -------- حالت چاپ -------- */
        @media print {
            body, html { background: #fff; }
            .exercise-grid {
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 10px 12px !important;
            }
            .day-card {
                page-break-inside: avoid !important;
            }
            img { max-width: 100% !important; height: auto !important; }
        }
    </style>
</head>

<body>

<main style="width: 100%; padding: 10px 0;">
    <div class="program-header">
        <h1 class="text-2xl font-semibold">برنامهٔ تمرینی: {{ $program->title }}</h1>
        <p style="margin-top:4px; font-size:12px;">مدت دوره: {{ $program->week_count }} هفته</p>
        <p style="font-size:12px;">مراجع: {{ $program->customer }}</p>
        @if($program->description)
            <p style="margin-top:6px; font-size:12px; color:#555;">{{$program->description}}</p>
        @endif
    </div>

    <div class="days-wrapper">
        @foreach($program->days as $day)
            @php
                $dayName = match ($day->day_of_week) {
                    0 => 'شنبه',
                    1 => 'یکشنبه',
                    2 => 'دوشنبه',
                    3 => 'سه‌شنبه',
                    4 => 'چهارشنبه',
                    5 => 'پنج‌شنبه',
                    6 => 'جمعه',
                    default => 'نامشخص',
                };
            @endphp

                <!-- یک روز کامل -->
            <section class="day-card">
                <header class="day-header">
                    <h2>{{ $dayName }}</h2>
                    <span style="font-size:12px; color:#777;">{{ $day->title }}</span>
                </header>

                <!-- تمرین‌ها به‌صورت دو ستون -->
                <div class="exercise-grid">
                    @foreach($day->exercises as $dayExercise)
                        @php
                            $exercise = $dayExercise->exercise;
                            $sets = $dayExercise->sets;
                        @endphp
                        @if($exercise)
                            <article class="exercise-card">
                                <div class="exercise-top">
                                    <img src="@if($exercise->image){{ asset('storage/'.$exercise->image) }}@else https://placehold.co/250x150?text=Exercise @endif"
                                         alt="{{ $exercise->name }}">
                                    <div class="exercise-name">{{ $exercise->name }}</div>
                                    <div style="font-size:11px; color:#666;">سطح: {{
                                        match($exercise->skill_complexity) {
                                            'Beginner' => 'مبتدی',
                                            'Intermediate' => 'متوسط',
                                            'Advanced' => 'پیشرفته',
                                            default => 'نامشخص',
                                        }
                                    }}</div>
                                </div>

                                @foreach($sets as $set)
                                    <div class="sets-table">
                                        <div><small>ست</small><br><strong>{{ $set->set_number }}</strong></div>
                                        <div><small>تکرار</small><br><strong>{{ $set->reps }}</strong></div>
                                        <div><small>سرعت</small><br><strong>{{ $set->tempo }}</strong></div>
                                        <div><small>استراحت</small><br><strong>{{ $set->rest_seconds }}</strong></div>
                                    </div>

                                    @if($set->note)
                                        <p class="note">نکته: {{ $set->note }}</p>
                                    @endif
                                @endforeach
                            </article>
                        @endif
                    @endforeach
                </div>
            </section>
        @endforeach


        <!-- بخش روزهای خاص / ریکاوری -->
        <section class="day-card">
            <header class="day-header">
                <h2>روزهای خاص و ریکاوری</h2>
            </header>
            <div class="exercise-grid">
                <div class="exercise-card">
                    <strong>روز استراحت فعال</strong>
                    <span class="note">Recovery</span>
                    <p class="note">پیاده‌روی سبک، کشش دینامیک، فومی رولینگ – فعال نگه داشتن عضلات بدون فشار زیاد.</p>
                </div>

                <div class="exercise-card">
                    <strong>تمرین هوازی</strong>
                    <span class="note">Cardio</span>
                    <p class="note">دویدن ۲۰‑۴۰ دقیقه یا دوچرخه‌سواری با شدت متغیر.</p>
                </div>

                <div class="exercise-card">
                    <strong>کشش و ریکاوری</strong>
                    <span class="note">Mobility</span>
                    <p class="note">تمرینات کششی استاتیک، تمرکز روی مفاصل و بهبود دامنهٔ حرکتی.</p>
                </div>
            </div>
        </section>
    </div>
</main>

</body>
</html>
