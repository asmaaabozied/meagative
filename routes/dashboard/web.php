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


            //countries
            Route::resource('countries', 'CountryController')->except(['show']);
            Route::post('countries/block/{id}', 'CountryController@block')->name('countries.block');
            //cities
            Route::resource('cities', 'CityController')->except(['show']);
            Route::post('cities/block/{id}', 'CityController@block')->name('cities.block');


            Route::post('settings', 'SettingController@updateAll')->name('settings.updateAll');

            Route::get('logout', 'UserController@logout')->name('logout');


            Route::get('logouts', function () {
                auth()->logout();
//                Session::forget('uid');
                return redirect('/');
//                firebase.auth().signOut();
            })->name('logouts');


        });//end of dashboard routes
    });





