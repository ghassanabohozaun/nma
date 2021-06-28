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



