<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    // Route::crud('produits', 'ProduitsCrudController');
    // Route::crud('categories', 'CategoriesCrudController');
    Route::crud('clients', 'ClientCrudController');
    // Route::crud('bonreductions', 'BonReductionsCrudController');
    Route::get('charts/weekly-users', 'Charts\WeeklyUsersChartController@response')->name('charts.weekly-users.index');
    // Route::crud('sliders', 'SlidersCrudController');


    // ------------------
    // AJAX Chart Widgets
    // ------------------
    Route::get('charts/users', 'Charts\LatestUsersChartController@response');
    Route::get('charts/new-entries', 'Charts\NewEntriesChartController@response');


  

    Route::crud('client', 'ClientCrudController');
    Route::crud('pays', 'PaysCrudController');
    Route::crud('villes', 'VillesCrudController');
    Route::crud('config', 'ConfigCrudController');
    Route::crud('contrat', 'ContratCrudController');
    Route::crud('revisions', 'RevisionsCrudController');
    Route::crud('paiement', 'PaiementCrudController');
    Route::crud('type-pret', 'TypePretCrudController');
    Route::crud('categorie-socio', 'CategorieSocioCrudController');
    Route::crud('contrat-travail', 'ContratTravailCrudController');
}); // this should be the absolute last line of this file