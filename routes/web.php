<?php

use Illuminate\Support\Facades\Route;

Route::view('/home', 'features.home');
Route::view('/aboutUs', 'features.aboutUs');
Route::view('/ourWorks', 'features.ourWorks');
Route::view('/mentorship', 'features.mentorship');
Route::view('/contactUs', 'features.contactUs');
Route::view('/profile', 'features.profile');

Route::view('/login', 'account.login');
Route::view('/register', 'account.register');