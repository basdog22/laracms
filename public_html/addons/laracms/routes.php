<?php

Route::get('/', 'LaraController@showMainpage');


Route::group(array('prefix' => 'backend'), function()
{
    Route::get('menus', 'LaraBackendController@menus');
    Route::get('newmenu', 'LaraBackendController@newmenu');
    Route::get('newmenuitem', 'LaraBackendController@newmenuitem');


    Route::get('menuitems/{menuid}','LaraBackendController@menuitems');
    Route::get('delmenu/{menuid}','LaraBackendController@delmenu');



    Route::post('addmenu', 'LaraBackendController@addmenu');
});