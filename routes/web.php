<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'beranda'])->name('beranda');
Route::get('/menu', [IndexController::class, 'menu'])->name('menu');
Route::get('/program', [IndexController::class, 'program'])->name('program');

Route::get('/checkout/{slug}', [PaymentController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::post('/place-order', [PaymentController::class, 'placeOrder'])->name('place.order')->middleware('auth');
Route::get('/success', [PaymentController::class, 'success'])->name('success');

Route::get('/artikel', [ArticleController::class, 'article'])->name('article');
Route::get('/artikel/{slug}', [ArticleController::class, 'showArticle'])->name('detailArtikel');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin']);

Route::get('/signup', [AuthController::class, 'signup']);
Route::post('/signup', [AuthController::class, 'processSignup']);

Route::middleware(['auth'])->group(function () {
    Route::get('/profil', [ProfileController::class, 'index']);
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/logout', [AuthController::class, 'logout']);

