<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailVerificationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

Route::get('/', function () {
    return view('login');
});

Route::post('/register/check-register', [AuthController::class, 'registration_check'])->name('registered');
Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware(['guest']);

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware(['guest']);
Route::post('/login/check', [AuthController::class, 'login_check'])->name('login_check');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::group(["middleware" => ['auth']], function () {

    Route::group(["middleware" => ['verified']], function (){
        Route::get('/details', [UserController::class, 'index'])->name('details');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
    
        Route::get('/change-password/{id}', [AuthController::class, 'change_password'])->name('change_password');
        Route::post('/change-password-check/{id}', [AuthController::class, 'change_password_check'])->name('password_check');
        Route::get('/welcome', [AuthController::class, 'welcome'])->name('welcome');
    });

});

Route::get('/email/verify',[EmailVerificationController::class, 'verify'])->name('verify');
Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verification'])->middleware(['auth', 'signed'])->name('verification.verify');


