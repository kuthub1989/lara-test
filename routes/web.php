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

$posts = [
    1 => [
        'title' => 'Intro to Laravel',
        'content' => 'This is a short intro to Laravel',
        'is_new' => true,
        'comments' => true
    ],
    2 => [
        'title' => 'Intro to PHP',
        'content' => 'This is a short intro to PHP',
        'is_new' => false
    ]
];


// Route::get('/', function () {
//     return view('home.index', []);
// });

// //Named Route
// Route::get('/contact', function () {
//     return view('home.contact');
// })
//     ->name("Contact");

//Simplified View Route
Route::view('/', 'home.index');
Route::view('/contact', 'home.contact');


//Dynamic Route with Regex pattern in RouteServiceProvider
Route::get('/post/{id}', function ($id) use ($posts) {

    abort_if(!isset($posts[$id]), 404);

    return view('post.show', ['post' => $posts[$id]]);
})
    ->name("SinglePost");

//PostList
Route::get('/post', function () use ($posts) {
    return view('post.index', ['posts' => $posts]);
});

//Dynamic Route with optional Parameter and with Where Regex Condition
Route::get('/recent-posts/{daysAgo?}', function ($daysAgo = 5) {
    return "posts are from last {$daysAgo} days ago.";
})
    ->where(['daysAgo' => '[0-9]+'])
    ->name("Dynamic Route with Optional Parameter");
