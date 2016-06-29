<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Home page
Route::get('/', function () {
    return view('welcome');
});

//Login, register, and password resets
Route::auth();

//Routes for settings changes
Route::get('/settings', 'SettingsController@index');
Route::post('/settings/store', 'SettingsController@store');

//Display list of top users
Route::get('/users', function () {
    return view('users');
});

//Route for AJAX and cache control of weather data
Route::get('/weatherapi', 'WeatherController@index');


