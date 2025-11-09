<x-dynamic-component
    :component="$getEntryWrapperView()"
    :entry="$entry"
>
    <div {{ $getExtraAttributeBag() }}>
        {{ $getState() }}
    </div>

    {{-- این کد تمام روزهای هفته را نمایش می دهد و در صورت لزوم به صورت افقی (Scroll) در می آید --}}
    <div class="overflow-x-auto bg-white rounded-lg shadow border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-3 py-3 text-right text-xs font-bold uppercase tracking-wider text-gray-600 w-1/12">روز هفته</th>
                <th class="px-3 py-3 text-right text-xs font-bold uppercase tracking-wider text-gray-600">جزئیات برنامه تمرینی</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">

            @foreach ($record->days as $day)
                <tr class="align-top hover:bg-blue-50/30 transition duration-150">

                    {{-- ستون ۱: روز هفته --}}
                    <td class="px-3 py-4 font-semibold text-gray-900 whitespace-nowrap">
                        {{ [
                            1 => 'شنبه', 2 => 'یکشنبه', 3 => 'دوشنبه',
                            4 => 'سه‌شنبه', 5 => 'چهارشنبه', 6 => 'پنج‌شنبه', 7 => 'جمعه'
                        ][$day->day_of_week] ?? 'روز نامشخص' }}
                    </td>

                    {{-- ستون ۲: تمرینات روز (جدول داخلی) --}}
                    <td class="px-3 py-3">
                        @if ($day->exercises->isEmpty())
                            <p class="text-gray-500 italic text-xs">برای این روز تمرینی ثبت نشده است.</p>
                        @else
                            {{-- جدول داخلی برای نمایش تمرینات --}}
                            <table class="w-full text-xs border border-gray-200 rounded-md overflow-hidden">
                                <thead class="bg-blue-100 text-blue-800">
                                <tr>
                                    <th class="px-2 py-2 text-right border-l">تصویر</th>
                                    <th class="px-2 py-2 text-right">نام تمرین</th>
                                    <th class="px-2 py-2 text-right">جزئیات ست‌ها (Reps, Sets, Rest, Tempo)</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($day->exercises as $exercise)
                                    <tr class="border-b last:border-b-0 hover:bg-yellow-50/50">
                                        {{-- تصویر --}}
                                        <td class="px-2 py-2 text-center border-l">
                                            @if($exercise->image_path)
                                                {{-- اگر image_path یک مسیر نسبی است، از asset() استفاده کنید --}}
                                                <img src="{{ asset('storage/' . $exercise->image_path) }}"
                                                     alt="{{ $exercise->name }}"
                                                     class="w-10 h-10 object-cover rounded mx-auto border">
                                            @else
                                                <span class="text-gray-400 text-[10px]">---</span>
                                            @endif
                                        </td>
                                        {{-- نام و توضیحات --}}
                                        <td class="px-2 py-2 font-medium text-gray-800">
                                            {{ $exercise->name }}
                                            <span class="block text-[10px] text-gray-500 mt-0.5">{{ $exercise->description ?? '-' }}</span>
                                        </td>

                                        {{-- جزئیات ست‌ها (با استفاده از فیلدهای جدید) --}}
                                        <td class="px-2 py-2">
                                            @if ($exercise->sets->isEmpty())
                                                <span class="text-gray-400 italic">ست‌ها خالی هستند</span>
                                            @else
                                                <ul class="space-y-1">
                                                    @foreach ($exercise->sets as $set)
                                                        <li class="bg-white p-1 rounded border border-gray-100">
                                                            <span class="font-bold text-blue-700">ست {{ $loop->iteration }}:</span>
                                                            {{ $set->reps ?? 0 }} تکرار | {{ $set->sets ?? 1 }} ست
                                                            <br>
                                                            استراحت: {{ $set->rest_secund ?? 60 }} ثانیه | تمپو: {{ $set->tempo ?? 'X/Y/Z/W' }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>



</x-dynamic-component>
