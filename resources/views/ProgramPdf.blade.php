<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>برنامه تمرینی</title>
    <style>
        @page { margin: 20px; }
        body {
            font-family: DejaVu Sans, sans-serif;
            direction: rtl;
            text-align: right;
            font-size: 13px;
            line-height: 1.6;
        }
        h1, h2 {
            color: #2c3e50;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #444;
        }
        th {
            background: #f2f2f2;
        }
        th, td {
            padding: 8px;
            vertical-align: top;
        }
        .exercise-img {
            max-width: 100px;
            height: auto;
        }
        .nested-table {
            width: 100%;
            border-collapse: collapse;
        }
        .nested-table th, .nested-table td {
            border: 1px solid #aaa;
            padding: 5px;
            font-size: 12px;
        }
    </style>
</head>
<body>
<h1>برنامه تمرینی</h1>
<p><strong>عنوان:</strong> {{ $program->title }}</p>
<p><strong>توضیحات:</strong> {{ $program->description }}</p>
<p><strong>مشتری:</strong> {{ $program->customer }}</p>

@foreach($program->days as $day)
    <h2>روز {{ $loop->iteration }} - {{ $day->title }} ({{ $day->day_of_week }})</h2>

    @if($day->exercises->count())
        <table>
            <thead>
            <tr>
                <th>نام تمرین</th>
                <th>تصویر</th>
                <th>توضیحات</th>
                <th>سطح</th>
                <th>ست‌ها</th>
            </tr>
            </thead>
            <tbody>
            @foreach($day->exercises as $dayExercise)
                <tr>
                    <td>{{ $dayExercise->exercise->title }}</td>
                    <td>
                        @if($dayExercise->exercise->image)
                            <img src="{{ public_path($dayExercise->exercise->image) }}" class="exercise-img">
                        @endif
                    </td>
                    <td>{{ $dayExercise->exercise->description }}</td>
                    <td>{{ $dayExercise->exercise->level }}</td>
                    <td>
                        <table class="nested-table">
                            <thead>
                            <tr>
                                <th>وزن</th>
                                <th>تکرار</th>
                                <th>یادداشت</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dayExercise->exercise->sets as $set)
                                <tr>
                                    <td>{{ $set->weight }}</td>
                                    <td>{{ $set->reps }}</td>
                                    <td>{{ $set->note }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>تمرینی برای این روز ثبت نشده است.</p>
    @endif
@endforeach
</body>
</html>
