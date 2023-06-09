<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController as UserController;
use App\Http\Controllers\HomeController as HomeController;
use App\Http\Controllers\TrungTamController as TrungTamController;
use App\Http\Controllers\XeController as XeController;


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

Route::controller(UserController::class)->group(function () {
    Route::get('login', 'viewLogin')->name('login');
    Route::post('login', 'login');
    Route::get('register', 'viewRegister')->name('register');
    Route::post('register', 'register');
    Route::get('logout', 'logout')->name('logout');
});

Route::group(['middleware' => ['check.login', 'check.role']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');

        //TRUNG TAM
        Route::prefix('trung-tam')->group(function () {
            Route::get('/', [TrungTamController::class, 'list'])->name('trung-tam.list');
            Route::get('/them-moi', [TrungTamController::class, 'viewCreate'])->name('trung-tam.create');
            Route::post('/them-moi', [TrungTamController::class, 'create']);
            Route::get('/{id}', [TrungTamController::class, 'viewUpdate'])->name('trung-tam.update');
            Route::post('/{id}', [TrungTamController::class, 'update']);
            Route::get('/xoa/{id}', [TrungTamController::class, 'destroy'])->name('trung-tam.delete');
        });

        //XE
        Route::prefix('xe')->group(function () {
            Route::get('/', [XeController::class, 'list'])->name('xe.list');
            Route::get('/them-moi', [XeController::class, 'viewCreate'])->name('xe.create');
            Route::post('/them-moi', [XeController::class, 'create']);
            Route::post('/import', [XeController::class, 'import'])->name('xe.import');
            Route::get('/export', [XeController::class, 'export'])->name('xe.export');
            Route::get('/{id}', [XeController::class, 'viewUpdate'])->name('xe.update');
        });
    });
});