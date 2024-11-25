<?php

use App\Http\Controllers\CAuth;
use App\Http\Controllers\CDirector;
use App\Http\Controllers\Tes;
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

Route::get('/', [Tes::class, 'index']);
Route::prefix('auth/')->name('auth.')->group(function () {
    Route::get('', [CAuth::class, 'index'])->name('index');
    Route::post('login', [CAuth::class, 'login'])->name('login');
});
Route::prefix('director/')->name('director.')->group(function () {
    Route::get('', [CDirector::class, 'dashboard'])->name('dashboard');
    Route::prefix('user_list')->name('user_list.')->group(function () {
        Route::get('', [CDirector::class, 'user_list'])->name('index');
        Route::post('',[CDirector::class, 'store_user'])->name('store');
        Route::put('update/{user}', [CDirector::class, 'update_user'])->name('update');
        Route::delete('destroy/{user}', [CDirector::class, 'destroy_user'])->name('destroy');
    });
    Route::prefix('manager_task')->name('manager_task.')->group(function () {
        Route::get('', [CDirector::class, 'manager_task'])->name('index');
        Route::get('assign_task', [CDirector::class, 'assign_task'])->name('create');
        Route::post('', [CDirector::class, 'store_task'])->name(name: 'store');
        Route::get('edit_task/{id}', [CDirector::class, 'edit_task'])->name('edit');
        Route::put('update/{managertask}', [CDirector::class, 'update_task'])->name('update');
        Route::delete('destroy/{managertask}', [CDirector::class, 'destroy_task'])->name('destroy');
    });
});
