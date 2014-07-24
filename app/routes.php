<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('before' => 'auth'), function()
{
    Route::get('backend/','BackendController@dashboard');
    Route::get('backend/help','BackendController@help');
    Route::get('backend/dashboard','BackendController@dashboard');
    Route::get('addons/manage','AddonsController@manage');
    Route::get('addons/uninstall/{addonid}','AddonsController@uninstall');
    Route::get('addons/install/{addonid}','AddonsController@install');
    Route::get('addons/new','AddonsController@newaddon');

    Route::get('themes/manage','ThemesController@manage');
    Route::get('themes/uninstall/{themeid}','ThemesController@uninstall');
    Route::get('themes/install/{themeid}','ThemesController@install');
    Route::get('themes/activate/{themeid}','ThemesController@activate');
    Route::get('themes/new','ThemesController@newtheme');

    Route::get('users/manage','UsersController@manage');
    Route::get('users/new','UsersController@newuser');

    Route::post('users/adduser','UsersController@adduser');
});


Route::controller("uploads",'UploadsController');

Route::controller('users', 'UsersController');
