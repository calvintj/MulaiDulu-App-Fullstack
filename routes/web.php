<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', [ArticleController::class, 'showAllArticle']);
Route::get('/home', [ArticleController::class, 'showAllArticle']);
Route::get('/articleDetail/{id}', [ArticleController::class, 'showDetailArticle']);
Route::view('/aboutUs', 'features.aboutUs');
Route::view('/ourWorks', 'features.ourWorks');
Route::view('/mentorship', 'features.mentorship');
Route::view('/contactUs', 'features.contactUs');
Route::view('/profile', 'features.profile');

Route::view('/login', 'account.login');
Route::view('/register', 'account.register');



