<?php
Route::group(array('before' => 'auth'), function () {
    Route::controller('laramce', 'LaramceController');
});