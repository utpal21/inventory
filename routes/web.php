<?php
Route::get('/','DashBoardController@index');
Route::get('/product','ProductsController@index');
Route::get('/product-group','ProductsController@product_group');