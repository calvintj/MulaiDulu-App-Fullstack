<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

require __DIR__.'/auth.php';

Route::get('/', [ArticleController::class, 'showHomePage']);
Route::get('/home', [ArticleController::class, 'showHomePage']);
Route::get('/articles', [ArticleController::class, 'showAllArticle']);
Route::get('/articleDetail/{id}', [ArticleController::class, 'showDetailArticle']);
Route::get('/experts', [ExpertController::class, 'showAllExpert']);
Route::get('/expertDetail/{id}', [ExpertController::class, 'showDetailExpert']);
Route::view('/aboutUs', 'features.aboutUs');
Route::view('/ourWorks', 'features.ourWorks');
Route::view('/mentorship', 'features.mentorship');
Route::view('/contactUs', 'features.contactUs');

Route::get('/', [CartController::class, 'index'])->name('courses.index');
Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/checkout', [CheckoutController::class, 'process'])->name('cart.checkout');

