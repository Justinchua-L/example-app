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

// continue study : template and views videos no.2

Route::get('/homeindex', function () {
    return view('home.index',[]);
})->name('home.index');

Route::get('/posts/{id}', function ($id) {

   return 'Blog post' . $id;
 })
//  ->where([   # use where to add constrain   // gloablly check RouteServiceProvider.php line 39
//  'id' => '[0-9]+' #'+' sign means need atleast 1 character
//  ])
 ->name('posts.show');
 


// '?' use for optional parameter 
Route::get('/recent-post/{days_ago?}', function ($daysAgo=20) {

   return 'Posts from  ' . $daysAgo . 'days ago';
})->name('posts.recent.index');

