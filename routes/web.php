<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LocaleController;

Route::get('/', [ReviewController::class, 'index'])->name('home');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store')->middleware('throttle:reviews');
Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
Route::put('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');
Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

Route::get('/reviews', fn () => redirect('/#reviews-list'))->name('reviews.index');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

Route::get('/lang/{locale}', [LocaleController::class, 'switch'])->name('language.switch');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/reviews', [AdminController::class, 'index'])->name('reviews');
    Route::post('/reviews/{id}/approve', [AdminController::class, 'approve'])->name('approve');
    Route::post('/reviews/{id}/reject', [AdminController::class, 'reject'])->name('reject');
    Route::post('/reviews/{id}/feature', [AdminController::class, 'toggleFeatured'])->name('toggle-featured');
    Route::delete('/reviews/{id}', [AdminController::class, 'destroy'])->name('destroy');
    Route::post('/reviews/bulk-approve', [AdminController::class, 'bulkApprove'])->name('bulk-approve');
    Route::post('/reviews/bulk-reject', [AdminController::class, 'bulkReject'])->name('bulk-reject');
    Route::post('/reviews/bulk-delete', [AdminController::class, 'bulkDelete'])->name('bulk-delete');
});
