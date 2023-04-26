<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\AnnonceAdminController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//création des routes pour l'administration
Route::middleware('auth',/*'can:admin'*/)->group(function () {

    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


    Route::get('admin/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::post('admin/category', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::post('admin/category/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('admin/category/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');


    Route::get('admin/annonce', [AnnonceAdminController::class, 'index'])->name('admin.annonce');
    Route::get('admin/annonce/store', [AnnonceAdminController::class, 'create'])->name('admin.annonce.create');
    Route::post('admin/annonce/store', [AnnonceAdminController::class, 'store'])->name('admin.annonce.store');

    Route::get('admin/annonce/edit/{id}', [AnnonceAdminController::class, 'edit'])->name('admin.annonce.edit');
    Route::post('admin/annonce/edit/{id}', [AnnonceAdminController::class, 'update'])->name('admin.annonce.update');

});

require __DIR__.'/auth.php';
