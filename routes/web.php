<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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
        'is_new' => true
    ],
    2 => [
        'title' => 'Intro to PHP',
        'content' => 'This is a short intro to PHP',
        'is_new' => false
    ]
];


/* Route::get('/', function () {
    return view('home.index', []);
}); */

// //Named Route
/* Route::get('/contact', function () {
    return view('home.contact');
})
    ->name("Contact"); */

//Simplified View Route
/* Route::view('/', 'home.index');
Route::view('/contact', 'home.contact'); */

//Controller Route
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

//Single Action Controller
Route::get('/about', AboutController::class)->name('SingleAction');

//Dynamic Route with Regex pattern in RouteServiceProvider
/*Route::get('/post/{id}', function ($id) use ($posts) {

    abort_if(!isset($posts[$id]), 404);

    return view('post.show', ['post' => $posts[$id]]);
})
    ->name("SinglePost");*/

//PostList
/*Route::get('/post', function () use ($posts) {
    return view('post.index', ['posts' => $posts]);
});*/

//Dynamic Route with optional Parameter and with Where Regex Condition
Route::get('/recent-posts/{daysAgo?}', function ($daysAgo = 5) {
    return "posts are from last {$daysAgo} days ago.";
})
    ->where(['daysAgo' => '[0-9]+'])
    ->name("Dynamic Route with Optional Parameter");

Route::resource('post', PostController::class);

//Grouping Routes of Same Prefix URL
Route::prefix('/test')->name('test.')->group(function () use ($posts) {
    //Request and Reponse Test
    Route::get('/response', function () use ($posts) {
        return response($posts, 201)
            ->header('Content-Type', 'application/json')
            ->cookie('MY_COOKIE', 'Kuthub', 3600);
    })->name('reponses');

    //Redirect
    Route::get('/redirect', function () {
        return redirect('/contact');
    })->name('redirect');

    //Back
    Route::get('/back', function () {
        return back();
    })->name('back');

    //Redirect Named Route
    Route::get('/named-redirect', function () {
        return redirect()->route('SinglePost', ['id' => 2]);
    })->name('Named-Redirect');

    //Redirect Away
    Route::get('/away', function () {
        return redirect()->away('https://google.com');
    })->name('away');

    //JSON Reponse
    Route::get('/json', function () use ($posts) {
        return response()->json($posts);
    })->name('json');

    //Download Reponse
    Route::get('/download', function () {
        return response()->download(public_path('/images/profile.jpg', 'face.jpg'));
    })->name('download');
});
