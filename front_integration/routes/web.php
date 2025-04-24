<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RechargecarteController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/recharge_carte',[TransactionController::class,'index'])->middleware(['auth','verified'])->name('recharge.carte');
Route::get('/transfere_argent',[RechargecarteController::class,'index'])->middleware(['auth','verified'])->name('transfere.argent');
Route::post('/transfere_argents',[TransactionController::class,'store'])->middleware(['auth','verified'])->name('envoie.argent.a.un.user');
Route::get('/info_perso',[TransactionController::class,'historic'])->middleware(['auth','verified'])->name('fiche_information');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
