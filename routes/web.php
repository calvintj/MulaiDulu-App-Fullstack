<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ExpertController;

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
Route::view('/profile', 'features.profile');

Route::view('/login', 'account.login');
Route::view('/register', 'account.register');



