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



// Route::get('/home-index', function () {
//     return view('home.index',[]);
// })->name('home.index');


// Route::get('/contact', function () {
//     return view('home.contact');
// })->name('home.contact');

route::view('/home','home.index')  #route:view for static pages
    ->name('home.index');
route::view('/contact','home.contact')
    ->name('home.contact');

    $posts = [
        1 => [
            'title' => 'Intro to Laravel',
            'content' => 'This is a short intro to Laravel',
            'is_new' =>true,
            'has_comments' =>true
        ],
        2 => [
            'title' => 'Intro to PHP',
            'content' => 'This is a short intro to PHP',
            'is_new' => false
        ],
    ];
    
Route::get('/posts',function() use($posts){
 return view('post.index',['posts' =>$posts]);
});
Route::get('/posts/{id}', function ($id) use($posts) {

 
    abort_if(!isset($posts[$id]),404); // generate error message if no record
   return view('post.show',['post'=>$posts[$id] ]);
 })

 
//  ->where([   # use where to add constrain   // gloablly check RouteServiceProvider.php line 39
//  'id' => '[0-9]+' #'+' sign means need atleast 1 character
//  ])
 ->name('posts.show');
 


// '?' use for optional parameter 
Route::get('/recent-post/{days_ago?}', function ($daysAgo=20) {

   return 'Posts from  ' . $daysAgo . 'days ago';
})->name('posts.recent.index');

