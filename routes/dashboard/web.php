<?php
Route::get('datatest', 'CustomerController@ajax')->name('datatest');

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
            //customers
            Route::resource('customers', 'CustomerController');

            Route::post('customers/block/{id}', 'CustomerController@block')->name('customers.block');

            //venues
            Route::resource('typevenues', 'TypevenueController');
            Route::post('typevenues/block/{id}', 'TypevenueController@block')->name('typevenues.block');

            Route::resource('halls', 'HallController');
            Route::post('halls/block/{id}', 'HallController@block')->name('halls.block');


            Route::resource('events', 'EventController');
            Route::post('events/block/{id}', 'EventController@block')->name('events.block');

            Route::resource('booking', 'BookingController');

            Route::post('booking/block/{id}', 'BookingController@block')->name('booking.block');

            Route::resource('catogeries', 'CatogeryController');

            Route::post('catogeries/block/{id}', 'CatogeryController@block')->name('catogeries.block');

            Route::resource('services', 'ServiceController');

            Route::post('services/block/{id}', 'ServiceController@block')->name('services.block');

            Route::resource('inquiries', 'InquiryController')->except(['show']);

            Route::post('inquiries/block/{id}', 'InquiryController@block')->name('inquiries.block');

            Route::resource('planers', 'PController');

            Route::post('planers/block/{id}', 'PController@block')->name('planers.block');


            Route::resource('pages', 'PageController');

            Route::post('pages/block/{id}', 'PageController@block')->name('pages.block');

            Route::resource('planners_ratings', 'PratingController');

            Route::post('planners_ratings/block/{id}', 'PratingController@block')->name('planners_ratings.block');

            Route::resource('venues_ratings', 'VratingController');

            Route::post('venues_ratings/block/{id}', 'VratingController@block')->name('venues_ratings.block');

            Route::resource('services_ratings', 'SratingController');

            Route::post('services_ratings/block/{id}', 'SratingController@block')->name('services_ratings.block');

            Route::resource('requirements', 'RequirementController');

            Route::post('requirements/block/{id}', 'RequirementController@block')->name('requirements.block');

            Route::resource('foods', 'FoodController');

            Route::post('foods/block/{id}', 'FoodController@block')->name('foods.block');

            Route::resource('venuesdays', 'VenuedayController');

            Route::resource('venuesdate', 'VenuedateController');

            Route::resource('servicescategories', 'ScatogeryController');

            Route::post('servicescategories/block/{id}', 'ScatogeryController@block')->name('servicescategories.block');

            Route::resource('dates_off', 'DateController');

            Route::resource('contact_us', 'ContactController')->except(['show']);

            Route::resource('settings', 'SettingController')->except(['show']);

            Route::resource('offers', 'OfferController');

            Route::resource('Usersvisitor', 'VisitorController')->except(['show']);

            Route::resource('sliders', 'SliderController')->except(['show']);

            Route::resource('venues_includes', 'Venue_includeController');

            Route::resource('customers_banks', 'CustomerbankController');

            Route::resource('customers_emails', 'CustomeremailController')->except(['show']);

            Route::resource('notifications', 'NotificationController')->except(['show']);

            Route::resource('venues_decoration', 'VenuedecorationController');

            Route::post('venues_decoration/block/{id}', 'VenuedecorationController@block')->name('venues_decoration.block');

            Route::post('settings', 'SettingController@updateAll')->name('settings.updateAll');

            Route::get('logout', 'UserController@logout')->name('logout');

            Route::get('soicallogin', function () {
                return view('firebase');

            });

            Route::get('payment', function () {
                $offer = \App\Models\Offer::first();
                return view('payments', compact('offer'));
            })->name('payment');

            Route::get('logouts', function () {
                auth()->logout();
//                Session::forget('uid');
                return redirect('/');
//                firebase.auth().signOut();
            })->name('logouts');


            Route::get('payments/{price}', 'PaymentController@chekoutpayments')->name('payments');
            Route::get('verify/payments', 'PaymentController@verifyPayment')->name('verify.payments');


            Route::resource('paymentss', 'PaymentsController');


            // SideMenu
            Route::post('savemenuitem_save', 'SideMenuItemController@saveMenuItem')->name('save.menu.item');
            Route::post('sidemenusection_save', 'SideMenuSectionController@saveSectionItem')->name('save.section.item');

            Route::resource('sidemenusection', 'SideMenuSectionController');
            Route::resource('sidemenuitem', 'SideMenuItemController');


            Route::get('styledashboard', function () {

                return view('layouts.dashboard.app');
            })->name('styledashboard');


            //reports all dashboard

            Route::get('reportvenues', 'ReportController@reportvenues')->name('reportvenues');

            Route::post('reports/venues', 'ReportController@searchreportvenues')->name('reports.venues');


            Route::get('reportplanners', 'ReportController@reportplanners')->name('reportplanners');

            Route::post('reports/planners', 'ReportController@searchreportplanners')->name('reports.planners');

            Route::get('reportservice', 'ReportController@reportservice')->name('reportservice');

            Route::post('reports/service', 'ReportController@searchreportservice')->name('reports.service');


            Route::get('reportcustomers', 'ReportController@reportcustomers')->name('reportcustomers');

            Route::post('reports/customers', 'ReportController@searchreportcustomers')->name('reports.customers');

//            Route::get('employee', 'ReportController@employee')->name('employee');



            // end of reports all dashboard



        });//end of dashboard routes
    });





