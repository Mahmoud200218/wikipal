<?php

use App\Http\Controllers\Admin\Auth\AdminProfileController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\SuperAdmin\PaymentMethodsController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth:admin', 'MarkNotificationAsRead', 'checkSuspendAdmins', 'EnsureIsAdmin'],
    'as' => 'admin.',
    'prefix' => 'admin/',
], function () {
    // ---------------------------- Admin Dashboard ----------------------------
    Route::get('dashboard/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('profile/', [AdminController::class, 'edit_profile'])->name('profile.edit');
    Route::patch('profile/', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [AdminProfileController::class, 'destroy'])->name('profile.destroy');

    // ---------------------------- Admin Dashboard | Stats ----------------------------
    Route::get('/admin/user-stats', [AdminController::class, 'dashboard'])->name('admin.user.stats');

    // ---------------------------- Admin Search ----------------------------
    Route::get('search-on/users', [AdminController::class, 'searchOnUsers'])->name('search.on.users');

    // ---------------------------- Manage Trusted & Suspended Users ----------------------------
    Route::get('trusted/users', [AdminController::class, 'trustedUsers'])->name('trusted.users');
    Route::put('change/trusted/user/{id}', [AdminController::class, 'changeTrustedUsers'])->name('change.trusted.users');
    Route::get('suspended/users', [AdminController::class, 'suspendedUsers'])->name('suspended.users');
    Route::put('suspend/user/{id}', [AdminController::class, 'changeSuspendedUsers'])->name('change.suspended.users');

    // ---------------------------- Manage Users ----------------------------
    Route::get('manage/users', [AdminController::class, 'manageUsers'])->name('manage.users');
    Route::delete('delete/user/{id}', [AdminController::class, 'deleteUser'])->name('delete.user');

    // ---------------------------- Administrator | Manage Admins ----------------------------
    Route::group([
        'middleware' => ['EnsureSuperAdmin'],
    ], function () {
        Route::get('manage/admins', [AdminController::class, 'manageAdmins'])->name('manage.admins');
        Route::get('super_admins/all_view', [AdminController::class, 'all_super_admins'])->name('all.super.admins');
        Route::get('promote_admin/{id}', [AdminController::class, 'promote_admin_view'])->name('promote.admin');
        Route::put('add_super/admin/{id}', [AdminController::class, 'addSuperAdmin'])->name('add.super.admin');
        Route::put('suspend/admin/{id}', [AdminController::class, 'suspendAdmin'])->name('suspend.admin');
        Route::delete('delete/admin/{id}', [AdminController::class, 'deleteAdmin'])->name('delete.admin');
    });

    // ---------------------------- Manage Payment Methods ----------------------------
    Route::get('payments/index', [PaymentMethodsController::class, 'index'])->name('payments');
    Route::get('payments-edit/{id}', [PaymentMethodsController::class, 'edit'])->name('payments.edit');
    Route::put('payments-update/{id}', [PaymentMethodsController::class, 'update'])->name('payments.update');

    // ---------------------------- Manage Contacts|Feedbacks ----------------------------
    Route::get('manage/contacts', [AdminController::class, 'manageContacts'])->name('manage.contacts');
    Route::get('contact/{id}', [AdminController::class, 'contactDetails'])->name('contact.details');
    Route::delete('delete/contact/{id}', [AdminController::class, 'deleteContact'])->name('delete.contact');

    // ---------------------------- Manage Advertisements ----------------------------
    Route::group([
        'middleware' => 'EnsureSuperAdmin'
    ], function () {
        Route::get('create/advertisements', [AdminController::class, 'adsCreate'])->name('ads.create');
        Route::post('create/advertisements', [AdminController::class, 'adsStore'])->name('ads.store');
        Route::get('manage/advertisements', [AdminController::class, 'manageAds'])->name('manage.ads');
        Route::put('ads/change/status/{id}', [AdminController::class, 'adsChangeStatus'])->name('ads.change.status');
        Route::delete('delete/ads/{id}', [AdminController::class, 'deleteAds'])->name('delete.ads');
    });

    // ---------------------------- Manage Quick News|Articles ----------------------------
    Route::get('quick_news/', [AdminController::class, 'createQuickNews'])->name('quick.news');
    Route::post('quick_news/', [AdminController::class, 'storeQuickNews'])->name('quick.news.store');
    Route::get('edit/{id}', [AdminController::class, 'editQuickNews'])->name('quick.news.edit');
    Route::put('quick_news/update/{id}', [AdminController::class, 'updateQuickNews'])->name('quick.news.update');
    Route::get('articles/manage_quick_news', [AdminController::class, 'manageQuickNews'])->name('manage.quick_news');
    Route::delete('delete_quick_news/{id}', [AdminController::class, 'destroyQuickNews'])->name('delete.quick_news');

    // ---------------------------- Manage & View News Categories|Status ----------------------------
    Route::get('view_news_categories/requests', [AdminController::class, 'ViewNewsRequestsCategories'])->name('news.categories.requests');
    Route::get('in_process/requests', [AdminController::class, 'In_ProcessNewsRequests'])->name('process.news.requests');
    Route::get('accepted/requests', [AdminController::class, 'AcceptedNewsRequests'])->name('accepted.news.requests');
    Route::get('rejected/requests', [AdminController::class, 'RejectedNewsRequests'])->name('rejected.news.requests');
    Route::put('news/status/{id}/update', [AdminController::class, 'changeNewsStatus'])->name('news.status.update');
    Route::get('{category}/{id}', [AdminController::class, 'newsRequestDetails'])->name('news.request.details');
});
