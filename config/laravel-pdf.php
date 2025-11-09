<?php

return [
    'driver' => Spatie\Browsershot\Browsershot::class , // از Chrome استفاده می‌کنه

    'options' => [
        'landscape' => true,
        'margins' => [
            'top' => 0,
            'bottom' => 0,
            'left' => 0,
            'right' => 0,
        ],
        // برای صفحات بلند
        'prefer_css_page_size' => true,
    ],

    // برای جاوااسکریپت Tailwind و رندر کامل
    'includes' => [
        'resources/css/app.css',
    ],
];
