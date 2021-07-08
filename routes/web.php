<?php

use Illuminate\Support\Facades\Auth;

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
/*   fronted website
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/', 'HomeController@index')->name('index');

//Route::post('password/savenewpassword', 'api/v1/ForgotPasswordController@reset');


Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');

    Artisan::call('config:cache');
    return "Cache is cleared";
});


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {
        Route::get('/', 'HomeController@website')->name('website');

//        Route::get('/testpro', function () {
//            $aUser = Auth::guard('customer')->loginUsingId(1);
//            return $aUser;
////            return auth()->guard('customer')->user(); 'guard'=>['customer'],
//
//        });


        Route::get('/events', 'EventController@index')->name('events');

        Route::get('/googlemap', 'HomeController@googlemap')->name('googlemap');

        Route::resource('/venues', 'VenuesController');

        Route::get('/detailbookvenues/{id}', 'VenuesController@detailbookvenues')->name('detailbookvenues');

        Route::get('/invite', 'BookingController@invite')->name('invite');

        Route::get('/message', 'BookingController@message')->name('message');

        Route::get('/points', 'BookingController@points')->name('points');

        Route::post('/addreview', 'BookingController@addreview')->name('addreview.store');


        Route::post('/invite/send', 'BookingController@invitsend')->name('invite.send');


        Route::post('/message/store', 'BookingController@Addmessage')->name('message.store');


        Route::resource('/bookings', 'BookingController');


        Route::get('/favouritevenues/{id}', 'VenuesController@favouritevenues')->name('favouritevenues');

        Route::get('sendPosition', 'HomeController@sendPosition')->name('sendPosition');

        Route::post('sendPosition', 'HomeController@sendPosition')->name('sendPosition');

        Route::get('showprofile', 'UserController@show')->name('showprofile');

        Route::post('/loginpassword', 'UserController@loginpassword')->name('loginpassword');

         Route::post('/selectcountry', 'UserController@selectcountry')->name('selectcountry');

        Route::post('/registercustomers', 'UserController@registercustomers')->name('registercustomers');
        Route::post('/signup', 'UserController@signup')->name('signup');

        Route::get('account', 'UserController@account')->name('account');

        Route::get('privacy', 'UserController@privacy')->name('privacy');

        Route::post('loginemail', 'UserController@loginemail')->name('loginemail');

        Route::post('verifycode', 'UserController@verifycode')->name('verifycode');

        Route::post('verifycodephone', 'UserController@verifycodephone')->name('verifycodephone');



        Route::get('favouritevenuess', 'UserController@favouritevenues')->name('favouritevenuess');


        Route::put('updateprofile/{id}', 'UserController@update')->name('updateprofile.update');

        Route::put('privacy/{id}', 'UserController@updateprivacy')->name('privacy.update');


    });






