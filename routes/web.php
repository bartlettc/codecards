<?php

Route::get('/', function() {
    echo "nope";
});

Route::get('/x', function () {
    return view('home');
});

Route::post('getimg', 'CardController@create');
Route::get('/{id}', 'CardController@display');

