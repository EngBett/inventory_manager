<?php

Route::get('/','universalController@index');
Route::get('pos','universalController@pos')->name('pos');

//items
Route::get('items','ItemsController@show')->name('items');
Route::get('add-items','ItemsController@add')->name('add-items');
Route::post('add-items','ItemsController@store');
Route::get('edit/{code}','ItemsController@edit')->name('edit-item');
Route::post('edit/{code}','ItemsController@update');
Route::get('stock/{code}','ItemsController@stock')->name('stock');
Route::post('stock/{code}','ItemsController@stockupdate');
Route::get('delete-item/{code}','ItemsController@delete')->name('delete-item');
//vue
Route::post('item-search','ItemsController@search');