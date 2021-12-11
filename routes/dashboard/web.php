<?php
Route::get('/admin-user-datatables', 'UserController@datatables')->name('admin-user-datatables');
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {

        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

            Route::get('/', 'WelcomeController@index')->name('welcome');



            //user routes
            Route::resource('users', 'UserController')->except(['show']);
            Route::post('users/block/{id}', 'UserController@block')->name('users.block');
            Route::resource('roles', 'RoleController')->except(['show']);
            //citizen&&jobs
            Route::resource('jobs', 'JobController')->except(['show']);
            Route::resource('citizens', 'CitizenController')->except(['show']);
            //cards
            Route::resource('cards', 'CardController')->except(['show']);
    //operations
            Route::resource('operations', 'OperationController')->except(['show']);


            //countries
            Route::resource('countries', 'CountryController')->except(['show']);
            Route::post('countries/block/{id}', 'CountryController@block')->name('countries.block');
            //cities
            Route::resource('cities', 'CityController')->except(['show']);
            Route::post('cities/block/{id}', 'CityController@block')->name('cities.block');

//setting
            Route::post('settings', 'SettingController@updateAll')->name('settings.updateAll');
//logout
            Route::get('logout', 'UserController@logout')->name('logout');





        });//end of dashboard routes
    });





