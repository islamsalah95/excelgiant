<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\HomController;
use App\Http\Controllers\Auth\LoginGoogelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

// Route::view('profile', 'profile')->middleware(['auth'])->name('profile');

// Route::middleware('auth')->group(function () {
//     Route::post('logout', function () { 
//     Auth::guard('web')->logout(); return redirect('/');})->name('logout');
       
//     require __DIR__ . '/dash.php';
//     });


// Route::get('/auth/redirect', [LoginGoogelController::class, 'redirect'])->name('googel.redirect');
// Route::get('/auth/callback', [LoginGoogelController::class, 'callback'])->name('google.callback');


// require __DIR__ . '/frontend.php';




Route::get('/', [HomController::class, 'index'])->name('hom.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::post('logout', function () { 
    Auth::guard('web')->logout(); return redirect('/');})->name('logout');
       
    require __DIR__ . '/dash.php';
    });
//  require __DIR__ . '/frontend.php';
Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/auth/redirect', [LoginGoogelController::class, 'redirect'])->name('googel.redirect');
Route::get('/auth/callback', [LoginGoogelController::class, 'callback'])->name('google.callback');
