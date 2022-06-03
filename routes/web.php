<?php

use Illuminate\Support\Facades\Route;



Route::view('/', 'home')->name('home');


// sessions
Route::view('login', 'sessions.signIn')->name('login');

Route::view('forgot', 'sessions.forgot')->name('forgot');
// Route::view('login', 'auth.login')->name('login');

//frontend
Route::view('accueil', 'accueil')->name('home');

Route::view('nouvelle-demande', 'demandeCredit')->name('demande');

/* pages statiques */
Route::view('/contact', 'static.contact')->name('contact');
Route::view('/politiqueretour', 'static.politiqueretour')->name('politiqueretour');
Route::view('/apropos', 'static.apropos')->name('apropos');
Route::view('/conditions', 'static.conditions')->name('conditions');
Route::view('/confidentialite', 'static.confidentialité')->name('confidentialité');

Route::get('/hgf/{nom}', function ($nom) { // custom admin routes
    /* pour vuejs */
    return view('cfm',compact("nom"));
})->name('cfm');


// route protegé par auth middleware
Route::group([
    'middleware' => 'App\Http\Middleware\Auth',
], function () {

    Route::get('/dashboard', function () {
        return view('frontend.dashboardv2');
    })->name('dashboard_version_2');
    
    Route::view('chat', 'frontend.chat')->name('chat');
    Route::view('contrat', 'frontend.basic-tables')->name('basic-tables');
    
    Route::view('profile', 'frontend.user-profile')->name('user-profile');
    
    Route::get('/historique', 'ClientController@historique')->name('client.historique');
    /* information personnelle */
    Route::get('/info', 'ClientController@info')->name('client.info');
    
    /* deconnexion */
    Route::get('/deconnexion', 'ClientController@deconnexion')->name('client.logout');

   });

/* pour la page vuejs */
Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array)config('backpack.base.web_middleware', 'web'),
        (array)config('backpack.base.middleware_key', 'admin')
    )
], function () { // custom admin routes
    /* pour vuejs */
    Route::view('/v/{vue_capture?}', 'vue.index')->where('vue_capture', '[\/\w\.-]*');
});

// route login et register
Route::get('/register', 'RegisterController@index')->name('register.index');
Route::post('/traitement-register', 'RegisterController@traitement')->name('register.traitement');
// Route::get('/login', 'LoginController@index')->name('login.index');
Route::post('/traitement-login', 'LoginController@traitement')->name('login.traitement');
   /* deconnexion */
   Route::get('/logout', 'ClientController@deconnexion')->name('client.logout');
