<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', ['code' => '<?php 
    echo "hello world"; 
    function Hello() {
        return count("blah");
    }' ]);
});


Route::post('getimg', 'CardController@create');
Route::get('/{id}', 'CardController@display');

//
//Route::group(['domain' => '{account}.codecards'], function () {
//    Route::get('/{id}', function ($account, $id) {
//        echo $id.' '.$account;
//    });
//
//
//});