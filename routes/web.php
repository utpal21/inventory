<?php
Route::get('/','DashBoardController@index');
Route::get('/product','ProductsController@index');
Route::get('/product-label','ProductsController@product_label');
Route::post('/add-product-label','ProductsController@store_product_label');
