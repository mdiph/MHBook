<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\levelController;

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

Route::get('/', [levelController::class, 'index'])->name('level.index');
Route::get('add', [levelController::class, 'create'])->name('level.create');
Route::post('store', [levelController::class, 'store'])->name('level.store');
Route::get('edit/{id}', [levelController::class, 'edit'])->name('level.edit');
Route::post('update/{id}', [levelController::class, 'update'])->name('level.update');
Route::post('delete/{id}', [levelController::class, 'delete'])->name('level.delete');