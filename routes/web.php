<?php

Route::get('/','universalController@index');
Route::get('pos','universalController@pos')->name('pos');