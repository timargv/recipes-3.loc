<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'HomeController@index')->name('home');

Auth::routes();


Route::group([
    'middleware' => ['auth'],
    ], function () {


    Route::group(['as' => 'feed.', 'namespace' => 'Recipe'], function () {
        Route::get('/', 'FeedController@index')->name('recipes');
    });

    Route::group(['as' => 'recipe.', 'namespace' => 'Recipe'], function () {
        Route::get('/recipe/create', 'RecipesController@create')->name('create');
        Route::get('/recipe{recipe}', 'RecipesController@show')->name('show');
        Route::get('/recipe{recipe}/edit', 'RecipesController@edit')->name('edit');
        Route::post('/recipe/store', 'RecipesController@store')->name('store');
    });

    Route::group(['as' => 'comment.', 'namespace' => 'Comment'], function () {
        Route::get('/comment{recipe}', 'CommentController@show')->name('show');
        Route::post('/comment/store', 'CommentController@store')->name('store');
    });

    Route::group(['as' => 'user.', 'namespace' => 'User'], function () {
        Route::get('/feed', 'UsersController@feed')->name('feed');
        Route::get('/id{user}', 'UsersController@show')->name('show');
        Route::get('/edit', 'UsersController@edit')->name('edit');
        Route::put('/update', 'UsersController@update')->name('update');

//        Route::group(['as' => 'user.like'], function () {
//            Route::get('/like', 'UsersController@like')->name('index');
//        });
    });

});


Route::group([
    'middleware' => ['admin'],
    'as' => 'admin.',
    'prefix' => 'admin',
    'namespace' => 'Admin'

], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'authors', 'as' => 'authors.', 'authors' => 'Authors'], function () {
        Route::resource('/', 'HomeController')->names([
            'index' => 'index',
            'show' => 'show',
            'destroy' => 'destroy',
            'edit' => 'edit',
            'update' => 'update'
        ]);
    });

    Route::group(['prefix' => 'ingredients', 'as' => 'ingredients.', 'namespace' => 'Ingredients'], function () {
        Route::resource('/', 'HomeController')->names([
            'index' => 'index',
            'show' => 'show',
            'destroy' => 'destroy',
            'edit' => 'edit',
            'update' => 'update'
        ]);
    });

    Route::group(['prefix' => 'categories', 'as' => 'categories.', 'namespace' => 'Categories'], function () {

        Route::get('/', 'HomeController@index')->name('index');
        Route::get('/{category}/show', 'HomeController@show')->name('show');
        Route::get('/{category}/edit', 'HomeController@edit')->name('edit');
        Route::get('/create', 'HomeController@create')->name('create');
        Route::post('/{category}/update', 'HomeController@update')->name('update');
        Route::put('/store', 'HomeController@store')->name('store');
        Route::delete('/{category}/delete', 'HomeController@destroy')->name('destroy');

        Route::group(['prefix' => '{category}'], function () {
            Route::post('/first', 'HomeController@first')->name('first');
            Route::post('/up', 'HomeController@up')->name('up');
            Route::post('/down', 'HomeController@down')->name('down');
            Route::post('/last', 'HomeController@last')->name('last');
        });
    });

    Route::group(['prefix' => 'comments', 'as' => 'comments.', 'namespace' => 'Comments'], function () {
        Route::resource('/', 'HomeController')->names([
            'index' => 'index',
            'show' => 'show',
            'destroy' => 'destroy',
            'edit' => 'edit',
            'update' => 'update'
        ]);
    });

    Route::group(['prefix' => 'images', 'as' => 'images.', 'namespace' => 'Images'], function () {
        Route::resource('/', 'HomeController');
    });

    Route::group(['prefix' => 'instructions', 'as' => 'instructions.', 'namespace' => 'Instructions'], function () {
        Route::resource('/', 'HomeController')->names([
            'index' => 'index',
            'show' => 'show',
            'destroy' => 'destroy',
            'edit' => 'edit',
            'update' => 'update'
        ]);
    });

    Route::group(['prefix' => 'instruments', 'as' => 'instruments.', 'namespace' => 'Instruments'], function () {
        Route::resource('/', 'HomeController')->names([
            'index' => 'index',
            'show' => 'show',
            'destroy' => 'destroy',
            'edit' => 'edit',
            'update' => 'update'
        ]);
    });

    Route::group(['prefix' => 'measures', 'as' => 'measures.', 'namespace' => 'Measures'], function () {
        Route::get('/', 'HomeController@index')->name('index');
        Route::get('/{measure}/show', 'HomeController@show')->name('show');
        Route::get('/{measure}/edit', 'HomeController@edit')->name('edit');
        Route::get('/create', 'HomeController@create')->name('create');
        Route::post('/{measure}/update', 'HomeController@update')->name('update');
        Route::put('/store', 'HomeController@store')->name('store');
        Route::delete('/{measure}/delete', 'HomeController@destroy')->name('destroy');
    });

    Route::group(['prefix' => 'recipes', 'as' => 'recipes.', 'namespace' => 'Recipes'], function () {
        Route::get('/', 'HomeController@index')->name('index');
        Route::get('/{recipe}/show', 'HomeController@show')->name('show');
        Route::get('/{recipe}/edit', 'HomeController@edit')->name('edit');
        Route::get('/create', 'HomeController@create')->name('create');
        Route::put('/update/{recipe}', 'HomeController@update')->name('update');
        Route::post('/store', 'HomeController@store')->name('store');
        Route::delete('/{recipe}/delete', 'HomeController@destroy')->name('destroy');
    });

});
