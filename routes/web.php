<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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

// Returning a variable
Route::get('/', function () {
    $name = request('name');
    return $name;
});

// How to pass the variable onto the view
Route::get('/', function () {
    $name = request('name');
    return view('welcome', ['name' => $name]);
});




Route::get('/test', function () {
    return view('test', ['name' => request('name')]);
});

// Using a closure
// Route::get('/posts/{post}', function ($post) {
//     $posts = [
//         'my-first-post' => 'Hello this is my first blog post',
//         'my-second-post' => 'Hello this is my second post'
//     ];

//     if(! array_key_exists($post, $posts)){
//         abort(404, "Sorry that post was not found");
//     }

//     return view('post', [
//         'post' => $posts[$post]
//     ]);
// });

// Using a controller
Route::get('/posts/{post}', [PostsController::class, 'show']);
