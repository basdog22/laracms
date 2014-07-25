<?php

Route::get('/', 'LaraController@showMainpage');


Route::group(array('prefix' => 'backend'), function()
{
    Route::get('menus', 'LaraBackendController@menus');
    Route::get('newmenu', 'LaraBackendController@newmenu');
    Route::get('newmenuitem', 'LaraBackendController@newmenuitem');


    Route::get('menuitems/{menuid}','LaraBackendController@menuitems');
    Route::get('editmenu/{menuid}','LaraBackendController@editmenu');
    Route::get('editmenuitem/{menuitemid}','LaraBackendController@editmenuitem');
    Route::get('delmenu/{menuid}','LaraBackendController@delmenu');


    Route::get('pages', 'LaraBackendController@pages');
    Route::get('newpage', 'LaraBackendController@newpage');
    Route::get('editpage/{pageid}', 'LaraBackendController@editpage');


    Route::post('savemenu', 'LaraBackendController@savemenu');
    Route::post('addmenu', 'LaraBackendController@addmenu');
    Route::post('addmenuitem', 'LaraBackendController@addmenuitem');
    Route::post('savemenuitem', 'LaraBackendController@savemenuitem');
    Route::post('savepage', 'LaraBackendController@savepage');
});