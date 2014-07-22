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

Route::controller('backend','BackendController');
Route::get('addons/manage','AddonsController@manage');
Route::get('addons/uninstall/{addonid}','AddonsController@uninstall');
Route::get('addons/install/{addonid}','AddonsController@install');
Route::get('addons/new','AddonsController@newaddon');

Route::controller("uploads",'UploadsController');

Route::controller('users', 'UsersController');
Route::get('/', 'FrontendController@showMainpage');
