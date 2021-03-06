<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
////////////////////////////////////////////////////////////////////////
/// auth  => that mean : must be admin and login
///

Route::group([
    'namespace' => 'Admin',
    'middleware' => ['auth:admin', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    //////////////////////////////////////////////////////////////////
    /// not found page
    Route::get('/notFound', 'DashboardController@notFound')->name('admin.not.found');
    //////////////////////////////////////////////////////////////////
    /// dashboard
    Route::get('/', 'DashboardController@index')->name('admin.dashboard')->middleware('can:dashboard');
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard')->middleware('can:dashboard');
    //////////////////////////////////////////////////////////////////
    /// settings
    Route::get('settings', 'DashboardController@getSettings')
        ->name('get.admin.settings')->middleware('can:settings');
    Route::post('settings', 'DashboardController@storeSettings')
        ->name('store.admin.settings')->middleware('can:settings');

    //////////////////////////////////////////////////////////////////
    /// admin routes
    Route::get('/admin', 'AdminsController@index')->name('get.admin')->middleware('can:admins');
    Route::get('/get-admin-by-id', 'AdminsController@getAdminById')->name('get.admin.by.id');
    Route::post('/admin-update', 'AdminsController@adminUpdate')->name('admin.update');

    //////////////////////////////////////////////////////////////////
    /// users Routes

    Route::group(['prefix' => 'users', 'middleware' => 'can:users'], function () {
        Route::get('/', 'UserController@index')->name('users');
        Route::get('/get-users', 'UserController@getUsers')->name('get.users');
        Route::post('/destroy', 'UserController@destroy')->name('user.destroy');
        Route::post('/change-status', 'UserController@changeStatus')->name('user.change.status');
        Route::get('/create', 'UserController@create')->name('user.create');
        Route::post('store', 'UserController@store')->name('user.store');
        Route::get('/edit/{id?}', 'UserController@edit')->name('user.edit');
        Route::post('update', 'UserController@update')->name('user.update');
        Route::get('/trashed-user', 'UserController@trashedUser')->name('users.trashed');
        Route::get('/get-trashed-users', 'UserController@getTrashedUsers')->name('get.trashed.users');
        Route::post('/force-delete', 'UserController@forceDelete')->name('user.force.delete');
        Route::post('/restore', 'UserController@restore')->name('user.restore');
    });

    ///////////////////////////////////////////////////////////////////
    /// Roles Routes
    Route::group(['prefix' => 'roles', 'middleware' => 'can:roles'], function () {
        Route::get('/', 'RolesController@index')->name('admin.roles');
        Route::get('/get-roles', 'RolesController@getRoles')->name('get.admin.roles');
        Route::get('/create', 'RolesController@create')->name('admin.role.create');
        Route::post('/store', 'RolesController@store')->name('admin.role.store');
        Route::post('/destroy', 'RolesController@destroy')->name('admin.role.destroy');
        Route::get('/edit/{id?}', 'RolesController@edit')->name('admin.role.edit');
        Route::post('/update', 'RolesController@update')->name('admin.role.update');
    });
    ///////////////////////////////////////////////////////////////////
    /// Regions Routes

    Route::group(['prefix' => 'regions'], function () {
        Route::get('/', 'RegionsController@index')->name('admin.regions');
    });

    Route::group(['prefix' => 'governorate'], function () {
        Route::post('/store-governorate', 'RegionsController@storeGovernorate')->name('governorate.store');
        Route::get('/get-all-governorates', 'RegionsController@getAllGovernorates')->name('get.all.governorates');
        Route::post('/destroy-governorate', 'RegionsController@destroyGovernorate')->name('governorate.destroy');
        Route::get('/edit-governorate', 'RegionsController@editGovernorate')->name('governorate.edit');
        Route::post('/update-governorate', 'RegionsController@updateGovernorate')->name('governorate.update');

    });

    Route::group(['prefix' => 'city'], function () {
        Route::post('/store-city', 'RegionsController@storeCity')->name('city.store');
        Route::get('/get-all-cities', 'RegionsController@getAllCities')->name('get.all.cities');
        Route::post('/destroy-city', 'RegionsController@destroyCity')->name('city.destroy');
        Route::get('/edit-city', 'RegionsController@editCity')->name('city.edit');
        Route::post('/update-city', 'RegionsController@updateCity')->name('city.update');
        Route::get('/get-city-by-governorate-id', 'RegionsController@getCityByGovernorateID')
            ->name('get.city.by.governorate.id');
    });

    Route::group(['prefix' => 'neighborhood'], function () {
        Route::post('/store-neighborhood', 'RegionsController@storeNeighborhood')->name('neighborhood.store');
        Route::post('/destroy-neighborhood', 'RegionsController@destroyNeighborhood')->name('neighborhood.destroy');
        Route::get('/edit-neighborhood', 'RegionsController@editNeighborhood')->name('neighborhood.edit');
        Route::post('/update-neighborhood', 'RegionsController@updateNeighborhood')->name('neighborhood.update');
        Route::get('/get-neighborhood-by-city-id', 'RegionsController@getNeighborhoodByCityID')
            ->name('get.neighborhood.by.city.id');

    });


    ///////////////////////////////////////////////////////////////////
    /// Aides Routes
    Route::group(['prefix' => 'aides', 'namespace' => 'Aides'], function () {
        ///////////////////////////////////////////////////////////////////
        /// beneficiaries Routes
        Route::group(['prefix' => 'beneficiaries'], function () {
            Route::get('/', 'BeneficiariesController@index')->name('aides.beneficiaries');
            Route::get('/get-beneficiaries', 'BeneficiariesController@getBeneficiaries')->name('get.aides.beneficiaries');
            Route::get('/create', 'BeneficiariesController@create')->name('aides.beneficiary.create');
            Route::post('/store', 'BeneficiariesController@store')->name('aides.beneficiary.store');
            Route::post('/destroy', 'BeneficiariesController@destroy')->name('aides.beneficiary.destroy');
            Route::get('/edit/{id?}', 'BeneficiariesController@edit')->name('aides.beneficiary.edit');
            Route::post('/update', 'BeneficiariesController@update')->name('aides.beneficiary.update');

        });

    });


    ///////////////////////////////////////////////////////////////////
    /// Upload Center routes
    Route::group(['prefix' => 'upload-center'], function () {
        Route::get('/', 'UploadCenterController@index')->name('admin.upload.center');
        Route::get('/get-upload-center-files', 'UploadCenterController@getUploadCenterFiles')
            ->name('get.admin.upload.center.files');
        Route::post('/store', 'UploadCenterController@store')->name('admin.upload.center.store');
        Route::post('/destroy', 'UploadCenterController@destroy')->name('admin.upload.center.destroy');
        Route::get('/get-file-by-id', 'UploadCenterController@getUploadCenterFileById')
            ->name('get.admin.upload.center.file.by.id');
    });
});


//////////////////////////////////////////////////////////////////////////////
/// Guest => that mean:must not be admin => because any one must be able to access login page
Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin'], function () {
    Route::get('login', 'LoginController@getLogin')->name('get.admin.login');
    Route::post('login', 'LoginController@doLogin')->name('admin.login');
});

//////////////////////////////////////////////////////////////////////////////
/// Logout
Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');



