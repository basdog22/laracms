<?php
Route::group(array('prefix' => 'backend','as'=>'backend'), function () {
    Route::get('laramce', 'LaramceController@settings');

    Route::post('save', 'LaramceController@save');

});