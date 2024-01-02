<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientReviewController;
use App\Http\Controllers\CoreValueController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\KeyFeatureController;
use App\Http\Controllers\OurClientController;
use App\Http\Controllers\OurProcessController;
use App\Http\Controllers\PointOfDifferenceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TechnologyController;
use App\Models\Service;
use Illuminate\Support\Facades\Route;

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

Route::name('frontend.')->group(function () {
    Route::get('/', [FrontEndController::class, 'index'])->name('index');
    Route::get('about-us', [FrontEndController::class, 'about'])->name('about');
    Route::get('services', [FrontEndController::class, 'services'])->name('services');
    $services = Service::all();
    foreach($services as $service) {
        Route::get($service->slug, [FrontEndController::class, 'show'])->name($service->slug);
    }
    Route::get('portfolio', [FrontEndController::class, 'portfolio'])->name('portfolio');
    Route::get('contact-us', [FrontEndController::class, 'contactUs'])->name('contact-us');
    Route::post('enquiries', [FrontEndController::class, 'enquiry'])->name('enquiries.store');
});

Route::middleware('ip-restriction')->group(function () {
    Route::get('/secure-page', [FrontEndController::class, 'restrictedPage']);
});

Route::controller(AuthController::class)->prefix('admin')->middleware('logged_in')->group(function() {
    Route::get('login', 'loginView')->name('login');
    Route::post('login', 'login')->name('login.check');
    Route::get('forgot-password', 'forgotPasswordView')->name('forgot-password');
    Route::post('forgot-password', 'forgotPassword')->name('forgot-password.check');
    Route::get('reset-password/{email}/{token}', 'resetPasswordView')->name('reset-password');
    Route::post('reset-password/reset', 'resetPassword')->name('reset-password.check');
});

Route::middleware('auth')->prefix('admin')->group(function() {
    Route::get('dashboard', [FrontEndController::class, 'dashboard'])->name('dashboard');

    Route::get('profile/edit', [FrontEndController::class, 'profile'])->name('profile.edit');
    Route::put('profile/update/{user}', [FrontEndController::class, 'profileUpdate'])->name('profile.update');

    Route::resource('goals', GoalController::class);
    Route::resource('our-clients', OurClientController::class);

    Route::get('enquiries', [FrontEndController::class, 'enquiriesList'])->name('enquiries.index');
    Route::delete('enquiries/{enquiry}', [FrontEndController::class, 'destroy'])->name('enquiries.destroy');

    Route::resource('hero-sections', HeroSectionController::class);
    Route::resource('point-of-differences', PointOfDifferenceController::class);

    Route::resource('services', ServiceController::class);
    Route::resource('service-categories', ServiceCategoryController::class);
    Route::resource('core-values', CoreValueController::class);
    Route::resource('achievements', AchievementController::class);
    Route::resource('technologies', TechnologyController::class);

    Route::resource('portfolios', PortfolioController::class);
    Route::resource('key-features', KeyFeatureController::class);
    Route::resource('our-processes', OurProcessController::class);
    Route::resource('client-reviews', ClientReviewController::class);

    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings/store', [SettingController::class, 'store'])->name('settings.store');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
