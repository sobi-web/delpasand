<div>
    <h2>برنامه تمرینی: {{ $record->title }}</h2>
    <p>{{ $record->description }}</p>

    @foreach($record->days as $day)
        <h3>روز {{ $loop->iteration }} - {{ $day->title }} ({{ $day->day_of_week }})</h3>

        @if($day->exercises->count())
            <table style="width:100%; border-collapse: collapse; margin-bottom: 20px;" border="1">
                <thead>
                <tr style="background:#f2f2f2;">
                    <th>تصویر</th>
                    <th>نام تمرین</th>

                    <th>سطح</th>
                    <th>ست‌ها</th>
                </tr>
                </thead>
                <tbody>
                @foreach($day->exercises as $dayExercise)
                    <tr>
                        <td>
                            @if($dayExercise->exercise->image)
                                {{-- نمایش تصویر تمرین --}}
                                <img src="{{ ('storage/' . $dayExercise->exercise->image) }}"
                                     alt="تصویر تمرین"
                                     style="max-width:100px; height:auto;">
                            @endif
                        </td>
                        <td>{{ $dayExercise->exercise->name }}</td>


                        <td>{{ $dayExercise->exercise->skill_complexity }}</td>
                        <td>
                            <table style="width:100%; border-collapse: collapse;" border="1">
                                <thead>
                                <tr style="background:#eee;">
                                    <th>تعداد ست</th>
                                    <th>تکرار</th>
                                    <th>تایم استراحت</th>
                                    <th> سرعت اجرا</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dayExercise->sets as $set)
                                    <tr>
                                        <td>{{ $set->set_number }}</td>
                                        <td>{{ $set->reps }}</td>
                                        <td>{{ $set->rest_seconds }}</td>
                                        <td>{{ $set->tempo }}</td>

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
</div>
