<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login_page');
});

Route::get('/login', [Controller::class, 'login_page'])->name('login_page');
Route::get('/logout', [Controller::class, 'logout'])->name('logout');
Route::post('/login_auth', [Controller::class, 'login'])->name('login');

Route::get('/account/profile', [AccountController::class, 'account_profile'])->middleware('auth')->name('account_profile');
Route::get('/account/tests', [AccountController::class, 'account_tests'])->middleware('auth')->name('account_tests');
Route::get('/account/archive', [AccountController::class, 'account_archive'])->middleware('auth')->name('account_archive');
Route::post('/account/reset_password', [AccountController::class, 'reset_password'])->middleware('auth')->name('reset_password');

Route::get('/test/new/with-timer/{id}', [TestController::class, 'newMyTestWithTimer'])->middleware('auth')->name('newTestWithTimer');
Route::get('/test/new/without-timer/{id}', [TestController::class, 'newMyTestWithoutTimer'])->middleware('auth')->name('newTestWithoutTimer');
Route::get('/test/with-timer/{id}', [TestController::class, 'myTestWithTimer'])->middleware('auth')->name('testWithTimer');
Route::get('/test/without-timer/{id}', [TestController::class, 'myTestWithoutTimer'])->middleware('auth')->name('testWithoutTimer');
Route::get('/test/complete/{id}', [TestController::class,'completeTest'])->middleware('auth')->name('completeTest');
Route::get('/test/result/{id}', [TestController::class,'result'])->middleware('auth')->name('result');
