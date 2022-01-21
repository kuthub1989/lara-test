<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//Named Route
Route::get('/contact', function () {
    return "<h1> Contact Page </h1>";
})
    ->name("Contact");

//Dynamic Route with Regex pattern in RouteServiceProvider
Route::get('/post/{id}', function ($id) {
    return "Your post ID is: " . $id;
})
    ->name("Dynamic Route");

//Dynamic Route with optional Parameter and with Where Regex Condition
Route::get('/recent-posts/{daysAgo?}', function ($daysAgo = 5) {
    return "posts are from last {$daysAgo} days ago.";
})
    ->where(['daysAgo' => '[0-9]+'])
    ->name("Dynamic Route with Optional Parameter");

//New Dynamic Routes
Route::get('/post/{category?}/{id?}', function ($category = "mobiles", $id = 25) {
    return "Your post ID is: $id. And It's from $category category.";
})
    ->where(['daysAgo' => '[0-9]+'])
    ->name("Dynamic Route");
