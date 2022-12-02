<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\levelController;
use App\Http\Controllers\areaController;
use App\Http\Controllers\monsterController;

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

Route::get('area/add', [areaController::class, 'create'])->name('area.create');
Route::post('area/store', [areaController::class, 'store'])->name('area.store');
Route::get('area/edit/{id}', [areaController::class, 'edit'])->name('area.edit');
Route::post('area/update/{id}', [areaController::class, 'update'])->name('area.update');
Route::post('area/delete/{id}', [areaController::class, 'delete'])->name('area.delete');

Route::get('monster/add', [monsterController::class, 'create'])->name('monster.create');
Route::post('monster/store', [monsterController::class, 'store'])->name('monster.store');
Route::get('monster/edit/{id}', [monsterController::class, 'edit'])->name('monster.edit');
Route::post('monster/update/{id}', [monsterController::class, 'update'])->name('monster.update');
Route::post('monster/delete/{id}', [monsterController::class, 'delete'])->name('monster.delete');