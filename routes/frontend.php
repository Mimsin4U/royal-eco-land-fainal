<?php

use App\Http\Controllers\ClientDashboardController;
use App\Http\Controllers\ClientLoginController;
use App\Http\Controllers\ClientSubscriptionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/download-form', [HomeController::class, 'downloadForm'])->name('downloadForm');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/category-details', [HomeController::class, 'categoryDetailsView'])->name('categoryDetails');
Route::get('/plot-category', [HomeController::class, 'plotCategory'])->name('plot.category');
Route::get('/plot-category-details/{id}', [HomeController::class, 'plotCategoryDetails'])->name('plotCategoryDetails');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/site-map', [HomeController::class, 'siteMap'])->name('site.map');
Route::get('/contact', [HomeController::class, 'contactUs'])->name('contact');
Route::post('/visit-request', [VisitRequestController::class, 'visitRequest'])->name('visitRequest');

Route::post('/client-subscription', [ClientSubscriptionController::class, 'store'])->name('storeSubscription');

// Client Auth Routes ------------------------>

Route::prefix('client')->controller(ClientLoginController::class)->name('client.')->group(function () {
    
    Route::get('/signin', 'clientSignInView')->name('signin.view');
    Route::post('/signin', 'clientSignIn')->name('signin');
    Route::post('/signout', 'clientSignOut')->name('signout');
});



// Cliend Dashboard --------------------> 

Route::middleware(['client'])->prefix('client')->name('client.')->group(function () {
    Route::get('/dashboard', [ClientDashboardController::class,'index'])->name('dashboard');
    Route::get('/plots', [ClientDashboardController::class, 'plots'])->name('plots');
    Route::get('/paymentSummery', [ClientDashboardController::class, 'paymentSummery'])->name('paymentSummery');
    Route::get('/installments', [ClientDashboardController::class, 'installments'])->name('installments');
    Route::get('/profile', [ClientDashboardController::class, 'profile'])->name('profile');
    Route::get('/changePassword', [ClientDashboardController::class, 'changePassword'])->name('changePassword');
    Route::post('/changePassword', [ClientDashboardController::class, 'updatePassword'])->name('updatePassword');
});

