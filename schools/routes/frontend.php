<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomController;
use App\Http\Controllers\Frontend\ErrorController;


// Route::get('/', [HomController::class, 'index'])->name('hom.index');


// Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
// Route::get('/about', [AboutController::class, 'index'])->name('about.index');
// Route::get('/privacy-policy', [PrivacyController::class, 'index'])->name('privacy.index');
// Route::get('/terms-and-conditions', [TermsController::class, 'index'])->name('terms.index');


Route::get('/error', [ErrorController::class, 'index'])->name('error.index');


