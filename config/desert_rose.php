<?php

return [
    'brand' => [
        'name' => 'Desert Rose Gifts',
        'tagline_en' => 'Authentic herbal bazaar in the heart of Hurghada',
        'tagline_ar' => 'بازار الأعشاب الأصيل في قلب الغردقة',
    ],

    'contact' => [
        'admin_email' => env('ADMIN_EMAIL', 'admin@desertrose.com'),
        'phone' => '+20 102 913 0640',
        'phone_tel' => '+201029130640',
        'whatsapp' => '201029130640',
        'address_en' => 'Sheraton Street, Hurghada, Red Sea Governorate, Egypt',
        'address_ar' => 'شارع شيراتون، الغردقة، محافظة البحر الأحمر، مصر',
        'hours_en' => 'Daily: 10:00 AM – 11:00 PM',
        'hours_ar' => 'يومياً: 10:00 صباحاً – 11:00 مساءً',
        'map_lat' => 27.094170,
        'map_lng' => 33.834292,
    ],

    'hero_slides' => [
        ['image' => 'images/carousel/saffron.jpg', 'alt' => 'Desert Rose Gifts — spices and herbs'],
        ['image' => 'images/carousel/chamomile.jpg', 'alt' => 'Desert Rose Gifts — traditional bazaar'],
        ['image' => 'images/carousel/mint.jpg', 'alt' => 'Desert Rose Gifts — Hurghada'],
    ],

    'locales' => [
        'en' => ['label' => 'English', 'flag' => '🇬🇧'],
        'ar' => ['label' => 'العربية', 'flag' => '🇸🇦'],
    ],
];
