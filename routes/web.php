<?php

use Illuminate\Support\Facades\Route;

//route pp

Route::get('/', function () {
    return view('frontend.dashboardv2');
})->name('dashboard_version_2');

Route::view('chat', 'frontend.chat')->name('chat');
Route::view('contrat', 'frontend.basic-tables')->name('basic-tables');

Route::view('profile', 'frontend.user-profile')->name('user-profile');




// sessions
Route::view('sessions/signIn', 'sessions.signIn')->name('signIn');
Route::view('sessions/signUp', 'sessions.signUp')->name('signUp');
Route::view('sessions/forgot', 'sessions.forgot')->name('forgot');

//frontend
Route::view('accueil', 'accueil')->name('home');

Route::view('nouvelle-demande', 'demandeCredit')->name('demande');


