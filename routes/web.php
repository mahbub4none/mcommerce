<?php

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UnitController;

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
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//  Category Routes
Route::resource('categories', CategoryController::class);
Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::put('categories/{id}', [CategoryController::class, 'update'])->name('categories.update');

// Brand Routes
Route::resource('brands', BrandController::class);
Route::get('brands/{id}/edit', [BrandController::class, 'edit'])->name('brands.edit');
Route::delete('brands/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');
Route::put('brands/{id}', [BrandController::class, 'update'])->name('brands.update');

// unit Routes
Route::resource('units', UnitController::class);
Route::get('units/{id}/edit', [UnitController::class, 'edit'])->name('units.edit');
Route::delete('units/{id}', [UnitController::class, 'destroy'])->name('units.destroy');
Route::put('units/{id}', [UnitController::class, 'update'])->name('units.update');

route::get('dashboard',function(){
    return view ('dashboard.index');
});