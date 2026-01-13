<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;

// الصفحة الرئيسية
Route::get('/', [ReviewController::class, 'index'])->name('home');

// حفظ المراجعة
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
