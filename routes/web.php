<?php

use App\Http\Controllers\admin\CategoryController;
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
    Route::get('admin/annonce', [AnnonceController::class, 'index'])->name('admin.annonce');
    Route::get('admin/annonce/create', [AnnonceController::class, 'create'])->name('admin.annonce.create');
    Route::get('admin/annonce/edit', [AnnonceController::class, 'edit'])->name('admin.annonce.edit');
});

require __DIR__.'/auth.php';
