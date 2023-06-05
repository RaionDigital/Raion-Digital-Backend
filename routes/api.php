<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\QuoteController;
use App\Http\Controllers\Api\v1\HeaderController;
use App\Http\Controllers\Api\v1\AboutUsController;
use App\Http\Controllers\Api\v1\ProjectController;
use App\Http\Controllers\Api\v1\ServiceController;
use App\Http\Controllers\Api\v1\ContactUsController;
use App\Http\Controllers\Api\v1\StaffMemberController;
use App\Http\Controllers\Api\v1\BriefElementController;
use App\Http\Controllers\Api\v1\QuoteElementController;
use App\Http\Controllers\Api\v1\SliderElementController;
use App\Http\Controllers\Api\v1\ContactSubmissionController;
use App\Http\Controllers\Api\v1\NewsletterSubscriberController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



/*
|--------------------------------------------------------------------------
| React/Frontend Routes
|--------------------------------------------------------------------------
|
|These Routes are intended for the user frontend only. They provide the api routes to use in axios requests from the ReactJs application.
*/

Route::middleware('guest')->group(function(){
    Route::get('/about-us',                 [AboutUsController::class, 'index'])          ->name('aboutElements.index');
    Route::get('/features',                 [BriefElementController::class, 'index'])     ->name('briefElements.index');
    Route::post('/submit-contact',          [ContactSubmissionController::class, 'store'])      ->name('contact.store');
    Route::get('/contact-us',               [ContactUsController::class, 'index'])      ->name('contactElements.index');
    Route::get('/header',                   [HeaderController::class, 'index'])          ->name('headerElements.index');
    Route::post('/subscribe-to-newsletter', [NewsletterSubscriberController::class, 'store'])->name('newsletter.store');
    Route::get('/projects',                 [ProjectController::class, 'index'])        ->name('projectElements.index');
    Route::post('/quote-submisson',         [QuoteController::class, 'store'])                    ->name('quote.store');
    Route::get('/quote-section',            [QuoteElementController::class, 'index'])     ->name('quoteElements.index');
    Route::get('/services',                 [ServiceController::class, 'index'])        ->name('serviceElements.index');
    Route::get('/sliders',                  [SliderElementController::class, 'index'])   ->name('sliderElements.index');
    Route::get('/staff-members',            [StaffMemberController::class, 'index'])       ->name('staffMembers.index');
});
