<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\BookmarkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\BusinessController;
use App\Http\Controllers\Dashboard\OpinionController;
use App\Http\Controllers\Dashboard\PoliticsController;
use App\Http\Controllers\Dashboard\SportsController;
use App\Http\Controllers\Dashboard\StoriesController;
use App\Http\Controllers\Dashboard\StylesController;
use App\Http\Controllers\Dashboard\TechController;
use App\Http\Controllers\Dashboard\TravelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdmin\PaymentMethodsController;
use App\Models\Dashboard\Opinion;
use Illuminate\Support\Facades\Route;

Route::get('dashboard/', [DashboardController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware(['auth:web', 'checkSuspendUsers', 'MarkNotificationAsRead']);

Route::group([
    'prefix' => 'dashboard/',
    'as' => 'dashboard.',
    'middleware' => ['auth', 'verified', 'checkSuspendUsers']

], function () {
    Route::get('success', [DashboardController::class, 'success'])->name('success');
    Route::get('update', [DashboardController::class, 'update'])->name('update');
    Route::get('delete', [DashboardController::class, 'delete'])->name('delete');
    Route::get('fail', [DashboardController::class, 'fail'])->name('fail');
    Route::resource('politics', PoliticsController::class);
    Route::resource('opinions', OpinionController::class);
    Route::resource('styles', StylesController::class);
    Route::resource('travel', TravelController::class);
    Route::resource('sports', SportsController::class);
    Route::resource('stories', StoriesController::class);
    Route::resource('business', BusinessController::class);
    Route::resource('tech', TechController::class);
});
// ------------------------- FIX DASHBOARD ROUTE PROBLEM ---------------------------
Route::group([
    'middleware' => ['auth', 'checkSuspendUsers']
], function () {
    Route::get('opinion_details/{id}/edit', [OpinionController::class, 'edit'])
        ->name('dashboard.opinions.edit');

    Route::get('politics_details/{id}/edit', [PoliticsController::class, 'edit'])
        ->name('dashboard.politics.edit');

    Route::get('business_details/{id}/edit', [BusinessController::class, 'edit'])
        ->name('dashboard.business.edit');

    Route::get('styles_details/{id}/edit', [StylesController::class, 'edit'])
        ->name('dashboard.styles.edit');

    Route::get('stories_details/{id}/edit', [StoriesController::class, 'edit'])
        ->name('dashboard.stories.edit');

    Route::get('sports_details/{id}/edit', [SportsController::class, 'edit'])
        ->name('dashboard.sports.edit');

    Route::get('travel_details/{id}/edit', [TravelController::class, 'edit'])
        ->name('dashboard.travel.edit');

    Route::get('tech_details/{id}/edit', [TechController::class, 'edit'])
        ->name('dashboard.tech.edit');
});

// ------------------------- START|BOOKMARK ROUTE ---------------------------
Route::post('/bookmarks/store', [BookmarkController::class, 'store'])->name('bookmarks.store');
Route::delete('/bookmarks/{id}/delete', [BookmarkController::class, 'destroy'])->name('bookmarks.destroy');
// ------------------------- END|BOOKMARK ROUTE ---------------------------

Route::middleware(['auth', 'checkSuspendUsers', 'password.confirm'])->group(function () {
    Route::get('/profile/settings', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/user/profile/overview', [ProfileController::class, 'user_profile'])->name('user.profile')
        ->middleware('MarkNotificationAsRead');
});
Route::post('report/user/{id}', [ProfileController::class, 'report_user'])->name('report.user');
Route::post('trust/point/user/{id}', [ProfileController::class, 'trust_point'])->name('trust.point');