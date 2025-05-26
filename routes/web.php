<?php

use App\Http\Controllers\Dashboard\LiveController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\SocialMediaController;
use Illuminate\Support\Facades\Route;

// -------------- Front Routes -----------------
Route::group([
    'middleware' => 'checkSuspendUsers',
], function () {

    Route::get('/', [FrontController::class, 'front'])->name('/');
    Route::get('politics/', [FrontController::class, 'politics'])->name('politics');
    Route::get('politics/{id}/details', [FrontController::class, 'politics_details'])->name('politics_details');
    Route::get('opinions/', [FrontController::class, 'opinions'])->name('opinions');
    Route::get('opinions/{id}/details', [FrontController::class, 'opinions_details'])->name('opinions_details');
    Route::get('sports/', [FrontController::class, 'sports'])->name('sports');
    Route::get('sports/{id}/details', [FrontController::class, 'sports_details'])->name('sports_details');
    Route::get('businesses/', [FrontController::class, 'businesses'])->name('businesses');
    Route::get('businesses/{id}/details', [FrontController::class, 'businesses_details'])->name('businesses_details');
    Route::get('stories/', [FrontController::class, 'stories'])->name('stories');
    Route::get('stories/{id}/details', [FrontController::class, 'stories_details'])->name('stories_details');
    Route::get('styles/', [FrontController::class, 'styles'])->name('styles');
    Route::get('styles/{id}/details', [FrontController::class, 'styles_details'])->name('styles_details');
    Route::get('techs/', [FrontController::class, 'techs'])->name('techs');
    Route::get('techs/{id}/details', [FrontController::class, 'techs_details'])->name('techs_details');
    Route::get('travels/', [FrontController::class, 'travels'])->name('travels');
    Route::get('travels/{id}/details', [FrontController::class, 'travels_details'])->name('travels_details');
    // -------------- Donations -----------------
    Route::get('donate/', [FrontController::class, 'donate'])->name('donate');
    Route::get('donations/', [FrontController::class, 'donations'])->name('donations');
    // -------------- Contact -----------------
    Route::get('contact/', [ContactController::class, 'contact'])->name('contact')->middleware('auth');
    Route::post('contact', [ContactController::class, 'store'])->name('contact.store');

    // -------------- Live -----------------
    Route::get('live', [LiveController::class, 'live'])->name('live');

    Route::post('donate/store', [DonateController::class, 'store'])->name('donate.store');
});

// -------------- Socialite -----------------
Route::get('auth/{provider}/redirect', [SocialiteController::class, 'redirect'])
    ->name('auth.socialite.redirect');

Route::get('auth/{provider}/callback', [SocialiteController::class, 'callback'])
    ->name('auth.socialite.callback');


// ------ Share News on Twitter ----------//
Route::post('/share-news', [SocialMediaController::class, 'sharePost'])->name('share.news');

// ------ Share News on Twitter ----------//
Route::get('search-on/news/articles', [FrontController::class, 'searchOnContent'])->name('search.on.content');

Route::get('user/overview/{id}', [FrontController::class, 'userOverview'])->name('user.overview');

// ------ Other Pages | Front ----------//
Route::group([
    'prefix' => 'pages/',
    'as' => 'pages.'
], function () {
    Route::get('welcome/', [FrontController::class, 'welcome'])->name('welcome');
    Route::get('about-us/', [FrontController::class, 'about_us'])->name('about');
    Route::get('team/', [FrontController::class, 'team'])->name('team');
    Route::get('faq/', [FrontController::class, 'faq'])->name('faq');
    Route::get('deactivated_user_account/', [FrontController::class, 'deactivated'])->name('deactivated');
    Route::get('access_denied/', [FrontController::class, 'access_denied'])->name('access_denied');
    Route::get('payment-success/', [FrontController::class, 'payment_success'])->name('payment.success');
    Route::get('payment-failed/', [FrontController::class, 'payment_failed'])->name('payment.failed');
});

// Payments Routes
Route::any('payment/{slug}/return', [DonateController::class, 'callback'])->name('payment.return');
Route::any('payment/{slug}/cancel', [DonateController::class, 'cancel'])->name('payment.cancel');

require __DIR__ . '/auth.php';
require __DIR__ . '/dashboard.php';
require __DIR__ . '/admin.php';
