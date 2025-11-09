<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8"/>
    <link rel="icon" type="image/svg+xml" href="{{asset('favicon.ico')}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>صفحه تمرین</title>
    @vite('resources/css/app.css')
    <style>
        @font-face {
            font-family: 'Vazir';
            font-style: normal;
            font-weight: normal;
            src: url('{{ storage_path('fonts/Vazir-Regular.ttf') }}') format('truetype');
        }

        @font-face {
            font-family: 'Vazir';
            font-style: normal;
            font-weight: bold;
            src: url('{{ storage_path('fonts/Vazir-Bold.ttf') }}') format('truetype');
        }

        body {
            direction: rtl;
            text-align: right;
            font-family: 'Vazir', DejaVu Sans, sans-serif;
            font-size: 14px;
        }

        h1, h2, h3, h4, h5 {
            font-weight: bold;
        }

        @page {
            size: auto;
            margin: 0;
        }

        html, body {
            height: auto !important;
            overflow: visible !important;
        }

        * {
            page-break-after: avoid !important;
            page-break-before: avoid !important;
            page-break-inside: avoid !important;
            break-inside: avoid !important;
            break-before: avoid !important;
            break-after: avoid !important;
        }

        main, section, article, div, img {
            page-break-inside: avoid !important;
            break-inside: avoid !important;
        }


    </style>
</head>

<body>
<main class="max-w-6xl mx-auto p-6 lg:p-10">
    <section class="bg-white rounded-2xl shadow-md p-6 lg:p-10 mb-8">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div>
                <h1 class="text-2xl lg:text-3xl font-semibold">برنامهٔ تمرینی: دوره افزایش حجم</h1>
                <p class="mt-1 text-sm text-gray-500">سطح: میان‌رده — مدت دوره: 8 هفته</p>
            </div>

            <div class="text-right">
                <div class="text-sm text-gray-500">مراجع:</div>
                <div class="mt-1 font-medium">علی رضایی</div>
            </div>
        </div>

        <div class="mt-6 border-t pt-4 text-gray-700">
            <p>
                توضیحات برنامه: این برنامه ترکیبی از تمرینات قدرتی و هوازی است که برای افزایش حجم و بهبود
                فرم بدنی طراحی شده. تمرین‌ها به‌صورت ۳ جلسه در هفته (با تمرکز بر گروه‌های عضلانی مختلف) تنظیم شده‌اند.
                سرعت اجرا و استراحت هر تمرین در کارت مربوطه آمده است.
            </p>
        </div>
    </section>

    <section class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <article class="bg-white rounded-2xl shadow p-5">
            <header class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold">شنبه</h2>
                <span class="text-sm text-gray-500">روز ۱</span>
            </header>

            <div class="space-y-4">
                <div class="flex flex-col lg:flex-row items-stretch gap-4 bg-gray-50 rounded-lg p-4">
                    <img src="https://placehold.co/280x180?text=1"
                         alt="تصویر تمرین" class="w-full lg:w-44 h-36 object-cover rounded-lg shrink-0"/>
                    <div class="flex-1">
                        <div class="flex items-start justify-between">
                            <h3 class="font-semibold text-md">پرس سینه با هالتر</h3>
                            <span class="text-sm text-gray-500">سطح: متوسط</span>
                        </div>

                        <div class="mt-3 grid grid-cols-2 gap-2 md:grid-cols-4">
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">ست</div>
                                <div class="font-medium">4</div>
                            </div>

                            <div class="text-sm">
                                <div class="text-xs text-gray-500">تکرار</div>
                                <div class="font-medium">8-10</div>
                            </div>

                            <div class="text-sm">
                                <div class="text-xs text-gray-500">سرعت اجرا</div>
                                <div class="font-medium">۲-۱-۲ (ثانیه)</div>
                            </div>

                            <div class="text-sm">
                                <div class="text-xs text-gray-500">استراحت</div>
                                <div class="font-medium">90 ثانیه</div>
                            </div>
                        </div>

                        <p class="mt-3 text-sm text-gray-600">نکته: تکنیک اجرای حرکت را حفظ کن و از افزایش وزنه ناگهانی
                            خودداری
                            کن.</p>
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row items-stretch gap-4 bg-gray-50 rounded-lg p-4">
                    <img src="https://placehold.co/280x180?text=2"
                         alt="تصویر تمرین" class="w-full lg:w-44 h-36 object-cover rounded-lg shrink-0"/>
                    <div class="flex-1">
                        <div class="flex items-start justify-between">
                            <h3 class="font-semibold text-md">پشت بازو دمبل نشسته</h3>
                            <span class="text-sm text-gray-500">سطح: متوسط</span>
                        </div>

                        <div class="mt-3 grid grid-cols-2 gap-2 md:grid-cols-4">
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">ست</div>
                                <div class="font-medium">3</div>
                            </div>

                            <div class="text-sm">
                                <div class="text-xs text-gray-500">تکرار</div>
                                <div class="font-medium">10-12</div>
                            </div>

                            <div class="text-sm">
                                <div class="text-xs text-gray-500">سرعت اجرا</div>
                                <div class="font-medium">1-1-2</div>
                            </div>

                            <div class="text-sm">
                                <div class="text-xs text-gray-500">استراحت</div>
                                <div class="font-medium">60 ثانیه</div>
                            </div>
                        </div>

                        <p class="mt-3 text-sm text-gray-600">نکته: از حرکت بدن برای کمک زدن جلوگیری کن.</p>
                    </div>
                </div>
            </div>
        </article>

        <article class="bg-white rounded-2xl shadow p-5">
            <header class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold">یکشنبه</h2>
                <span class="text-sm text-gray-500">روز ۲</span>
            </header>

            <div class="space-y-4">
                <div class="flex flex-col lg:flex-row items-stretch gap-4 bg-gray-50 rounded-lg p-4">
                    <img src="https://placehold.co/280x180?text=3" alt="تصویر"
                         class="w-full lg:w-44 h-36 object-cover rounded-lg shrink-0"/>
                    <div class="flex-1">
                        <div class="flex items-start justify-between">
                            <h3 class="font-semibold text-md">اسکوات با هالتر</h3>
                            <span class="text-sm text-gray-500">پیشرفته</span>
                        </div>

                        <div class="mt-3 grid grid-cols-2 gap-2 md:grid-cols-4">
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">ست</div>
                                <div class="font-medium">5</div>
                            </div>
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">تکرار</div>
                                <div class="font-medium">5-6</div>
                            </div>
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">سرعت اجرا</div>
                                <div class="font-medium">2-1-2</div>
                            </div>
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">استراحت</div>
                                <div class="font-medium">120 ثانیه</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row items-stretch gap-4 bg-gray-50 rounded-lg p-4">
                    <img src="https://placehold.co/280x180?text=4" alt="تصویر"
                         class="w-full lg:w-44 h-36 object-cover rounded-lg shrink-0"/>
                    <div class="flex-1">
                        <div class="flex items-start justify-between">
                            <h3 class="font-semibold text-md">ددلیفت رومانیایی</h3>
                            <span class="text-sm text-gray-500">متوسط</span>
                        </div>

                        <div class="mt-3 grid grid-cols-2 gap-2 md:grid-cols-4">
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">ست</div>
                                <div class="font-medium">4</div>
                            </div>
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">تکرار</div>
                                <div class="font-medium">8-10</div>
                            </div>
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">سرعت اجرا</div>
                                <div class="font-medium">2-2-2</div>
                            </div>
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">استراحت</div>
                                <div class="font-medium">90 ثانیه</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <article class="bg-white rounded-2xl shadow p-5">
            <header class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold">دوشنبه</h2>
                <span class="text-sm text-gray-500">روز ۳</span>
            </header>
            <div class="space-y-4">
                <div class="flex flex-col lg:flex-row items-stretch gap-4 bg-gray-50 rounded-lg p-4">
                    <img src="https://placehold.co/280x180?text=5" alt="تصویر"
                         class="w-full lg:w-44 h-36 object-cover rounded-lg shrink-0"/>
                    <div class="flex-1">
                        <h3 class="font-semibold">زیربغل هالتر خم</h3>
                        <div class="mt-3 grid grid-cols-2 gap-2 md:grid-cols-4">
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">ست</div>
                                <div class="font-medium">4</div>
                            </div>
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">تکرار</div>
                                <div class="font-medium">8-10</div>
                            </div>
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">سرعت اجرا</div>
                                <div class="font-medium">2-1-2</div>
                            </div>
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">استراحت</div>
                                <div class="font-medium">90 ثانیه</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <article class="bg-white rounded-2xl shadow p-5">
            <header class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold">سه‌شنبه</h2>
                <span class="text-sm text-gray-500">روز ۴</span>
            </header>
            <div class="space-y-4">
                <div class="flex flex-col lg:flex-row items-stretch gap-4 bg-gray-50 rounded-lg p-4">
                    <img src="https://placehold.co/280x180?text=6" alt="تصویر"
                         class="w-full lg:w-44 h-36 object-cover rounded-lg shrink-0"/>
                    <div class="flex-1">
                        <h3 class="font-semibold">شکم کرانچ با وزنه</h3>
                        <div class="mt-3 grid grid-cols-2 gap-2 md:grid-cols-4">
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">ست</div>
                                <div class="font-medium">3</div>
                            </div>
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">تکرار</div>
                                <div class="font-medium">15</div>
                            </div>
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">سرعت اجرا</div>
                                <div class="font-medium">1-1-1</div>
                            </div>
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">استراحت</div>
                                <div class="font-medium">45 ثانیه</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <article class="bg-white rounded-2xl shadow p-5">
            <header class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold">چهارشنبه</h2>
                <span class="text-sm text-gray-500">روز ۵</span>
            </header>
            <div class="space-y-4">
                <div class="flex flex-col lg:flex-row items-stretch gap-4 bg-gray-50 rounded-lg p-4">
                    <img src="https://placehold.co/280x180?text=7" alt="تصویر"
                         class="w-full lg:w-44 h-36 object-cover rounded-lg shrink-0"/>
                    <div class="flex-1">
                        <h3 class="font-semibold">شراگ با دمبل</h3>
                        <div class="mt-3 grid grid-cols-2 gap-2 md:grid-cols-4">
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">ست</div>
                                <div class="font-medium">4</div>
                            </div>
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">تکرار</div>
                                <div class="font-medium">10</div>
                            </div>
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">سرعت اجرا</div>
                                <div class="font-medium">1-1-2</div>
                            </div>
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">استراحت</div>
                                <div class="font-medium">60 ثانیه</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <article class="bg-white rounded-2xl shadow p-5">
            <header class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold">پنجشنبه</h2>
                <span class="text-sm text-gray-500">روز ۶</span>
            </header>
            <div class="space-y-4">
                <div class="flex flex-col lg:flex-row items-stretch gap-4 bg-gray-50 rounded-lg p-4">
                    <img src="https://placehold.co/280x180?text=8" alt="تصویر"
                         class="w-full lg:w-44 h-36 object-cover rounded-lg shrink-0"/>
                    <div class="flex-1">
                        <h3 class="font-semibold">لانچ با دمبل</h3>
                        <div class="mt-3 grid grid-cols-2 gap-2 md:grid-cols-4">
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">ست</div>
                                <div class="font-medium">3</div>
                            </div>
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">تکرار</div>
                                <div class="font-medium">12</div>
                            </div>
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">سرعت اجرا</div>
                                <div class="font-medium">2-1-2</div>
                            </div>
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">استراحت</div>
                                <div class="font-medium">75 ثانیه</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <article class="bg-white rounded-2xl shadow p-5">
            <header class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold">جمعه</h2>
                <span class="text-sm text-gray-500">روز ۷</span>
            </header>
            <div class="space-y-4">
                <div class="flex flex-col lg:flex-row items-stretch gap-4 bg-gray-50 rounded-lg p-4">
                    <img src="https://placehold.co/280x180?text=9" alt="تصویر"
                         class="w-full lg:w-44 h-36 object-cover rounded-lg shrink-0"/>
                    <div class="flex-1">
                        <h3 class="font-semibold">تمرین هوازی دویدن (سرعت متوسط)</h3>
                        <div class="mt-3 grid grid-cols-2 gap-2 md:grid-cols-4">
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">ست</div>
                                <div class="font-medium">1</div>
                            </div>
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">مدت</div>
                                <div class="font-medium">30 دقیقه</div>
                            </div>
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">شدت</div>
                                <div class="font-medium">متوسط</div>
                            </div>
                            <div class="text-sm">
                                <div class="text-xs text-gray-500">استراحت</div>
                                <div class="font-medium">—</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>

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
