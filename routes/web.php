<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

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

Route::get('/', [ArticleController::class, 'showHomePage'])->name('home');;
Route::get('/home', [ArticleController::class, 'showHomePage'])->name('home');
// Route::get('/articles', [ArticleController::class, 'showAllArticle']);
Route::get('/articleDetail/{id}', [ArticleController::class, 'showDetailArticle']);
Route::get('/experts', [ExpertController::class, 'showAllExpert']);
Route::get('/expertDetail/{id}', [ExpertController::class, 'showDetailExpert']);
Route::view('/aboutUs', 'features.aboutUs');
Route::get('/ourWorks', [ReviewController::class, 'showAllReview']);
Route::view('/contactUs', 'features.contactUs');

// Cart

Route::get('/mentorship', [CartController::class, 'index'])->name('mentorship.index');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/{id}/increase', [CartController::class, 'increaseQuantity'])->name('cart.increase');
Route::post('/cart/{id}/decrease', [CartController::class, 'decreaseQuantity'])->name('cart.decrease');
Route::delete('/cart/{id}/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::post('/cart/add/{course}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/add/expert/{expert}', [CartController::class, 'addExpertToCart'])->name('cart.add.expert');
Route::post('/cart/checkout', [CheckoutController::class, 'process'])->name('checkout.process');

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);

//CRUD
Route::prefix('Admin')->name('Admin.')->group(function () {
    Route::resource('articlesCRUD', ArticleController::class);
});

Route::prefix('Admin')->name('Admin.')->group(function () {
    Route::resource('expertsCRUD', ExpertController::class);
});
