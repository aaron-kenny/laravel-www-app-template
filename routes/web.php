<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\MarketingEmailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\BillingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('notification', function () {
//     $user = App\Models\User::find(1);
//     return (new App\Notifications\EmailVerification(['firstName'=>'John','lastName'=>'Doe','subscriptionName'=>'Product One']))->toMail($user);
// });

Route::get('/healthz', function() { return response('', 200); })->withoutMiddleware(['web']);

Auth::routes(['verify' => true]);

// WEBPAGE ROUTES
Route::view('/', 'web.index')->name('web.index');
Route::view('/about', 'web.about')->name('web.about');

// PRODUCT ROUTES
Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/{product_name}', [ProductController::class, 'show'])->name('product.show');

// SUPPORT ROUTES
Route::get('/support', [SupportController::class, 'index'])->name('support.index');
Route::get('/support/create', [SupportController::class, 'create'])->name('support.create');
Route::post('/support', [SupportController::class, 'store'])->name('support.store');

// LEGAL ROUTES
Route::view('/legal', 'legal.index')->name('legal.index');
Route::view('/legal/terms-of-service', 'legal.terms')->name('legal.terms');
Route::view('/legal/privacy-policy', 'legal.privacy')->name('legal.privacy');
Route::view('/legal/acceptable-use-policy', 'legal.acceptable-use')->name('legal.acceptable-use');

// DOCUMENTATION ROUTES
Route::get('/documentation', [DocumentationController::class, 'index'])->name('documentation.index');
Route::get('/documentation/{product_name}', [DocumentationController::class, 'show'])->name('documentation.show');

// MARKETING EMAIL ROUTES
Route::post('/marketing-email', [MarketingEmailController::class, 'store'])->name('marketing-email.store');

// AUTHENTICATED ROUTES
Route::middleware(['auth', 'verified'])->group(function() {
    // DASHBOARD ROUTES
    Route::get('/account/dashboard', [DashboardController::class, 'index'])->name('account.dashboard.index');

    // PROFILE ROUTES
    Route::get('/account/profile', [ProfileController::class, 'index'])->name('account.profile.index');
    Route::get('/account/profile/edit', [ProfileController::class, 'edit'])->name('account.profile.edit');
    Route::put('/account/profile', [ProfileController::class, 'update'])->name('account.profile.update');
    Route::delete('/account/profile/destroy', [ProfileController::class, 'destroy'])->name('account.profile.destroy');

    // PASSWORD ROUTES
    Route::get('/account/password/edit', [PasswordController::class, 'edit'])->name('account.password.edit');
    Route::put('/account/password', [PasswordController::class, 'update'])->name('account.password.update');

    // SUBSCRIPTION ROUTES
    Route::get('/subscriptions',                        [SubscriptionController::class, 'index'])->name('subscriptions.index');
    Route::get('/subscriptions/create',                 [SubscriptionController::class, 'create'])->name('subscriptions.create');
    Route::get('/subscriptions/{id}',                   [SubscriptionController::class, 'show'])->name('subscriptions.show');
    Route::get('/subscriptions/{id}/change',            [SubscriptionController::class, 'change'])->name('subscriptions.change');
    Route::get('/subscriptions/{id}/cancel',            [SubscriptionController::class, 'cancel'])->name('subscriptions.cancel');
    Route::get('/subscriptions/{id}/renew',             [SubscriptionController::class, 'renew'])->name('subscriptions.renew');
    Route::get('/subscriptions/{id}/preview/{plan_id}', [SubscriptionController::class, 'preview'])->name('subscriptions.preview');
    Route::post('/subscriptions',                       [SubscriptionController::class, 'store'])->name('subscriptions.store');
    Route::patch('/subscriptions/{id}',                 [SubscriptionController::class, 'update'])->name('subscriptions.update');
    Route::delete('/subscriptions/{id}',                [SubscriptionController::class, 'destroy'])->name('subscriptions.destroy');

    // BILLING ROUTES
    Route::get('/account/billing', [BillingController::class, 'index'])->name('account.billing.index');
    Route::get('/account/billing/create', [BillingController::class, 'create'])->name('account.billing.create');
    Route::get('/account/billing/{payment_method_id}/edit', [BillingController::class, 'edit'])->name('account.billing.edit');
    Route::post('/account/billing', [BillingController::class, 'store'])->name('account.billing.store');
    Route::patch('/account/billing/{payment_method_id}', [BillingController::class, 'update'])->name('account.billing.update');
    Route::delete('/account/billing/{payment_method_id}', [BillingController::class, 'destroy'])->name('account.billing.destroy');
});