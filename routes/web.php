<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\{HomeImageController,HomeSectionController,ChangePasswordController};

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

Route::get('/', function () {
    return redirect()->route('login');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resources([
        'home-banner-image' => HomeImageController::class,
        'home-sections' => HomeSectionController::class,
        'change-password' =>ChangePasswordController::class,
    ]);

    Route::get('/home', function () {
        return redirect()->route('home-banner-image.index');
    })->middleware(['auth', 'verified'])->name('home');

    Route::group(['prefix' => 'home-banner-image'], function () {
        Route::post('/listing', [HomeImageController::class, 'listing']);
        Route::post('/delete-image', [HomeImageController::class, 'deleteImage']);
    
    });

    Route::group(['prefix' => 'change-password'], function () {
        Route::post('/old-password-check', [ChangePasswordController::class, 'oldPasswordCheck']);
    });
});

require __DIR__.'/auth.php';
