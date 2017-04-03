<?php

Route::get('/', function () {
    return view('home');
});


Route::post('getimg', 'CardController@create');
Route::get('/{id}', 'CardController@display');

