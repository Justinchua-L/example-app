<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use GuzzleHttp\Psr7\Request;
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

route::get('/home', [HomeController::class,'home'])  #route:view for static pages
    ->name('home.index');
route::get('/contact',[HomeController::class,'contact'])
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
        3 => [
            'title' => 'Intro to Golang',
            'content' => 'This is a short intro to Golang',
            'is_new' => false
        ],
    ];
    
// Route::get('/posts',function() use($posts){
 
//     return view('post.index',['posts' =>$posts]);
// });
// Route::get('/posts/{id}', function ($id) use($posts) {

 
//     abort_if(!isset($posts[$id]),404); // generate error message if no record
//    return view('post.show',['post'=>$posts[$id] ]);
//  })

 
// //  ->where([   # use where to add constrain   // gloablly check RouteServiceProvider.php line 39
// //  'id' => '[0-9]+' #'+' sign means need atleast 1 character
// //  ])
//  ->name('posts.show');
 
Route::resource('posts',PostController::class)->only('index','show'); // use only() is just need spefic function

// '?' use for optional parameter 
Route::get('/recent-post/{days_ago?}', function ($daysAgo=20) {

   return 'Posts from  ' . $daysAgo . 'days ago';
})->name('posts.recent.index');

// response and reqeust lecture 
Route::prefix('/fun')->name('fun.')->group(function() use($posts){


    Route::get('/responses', function() use($posts){
        return  response($posts,201)
            ->header('Content-type','application/json')
            ->cookie('MY_COOKIE','Justin Chua',3600);
        })->name('response');
        
        Route::get('/redirect',function(){
         return redirect('/home.contact');
        })->name('redirect');
        
        Route::get('/download', function() use($posts){
        return response()->download(public_path('/picture.jpg'),'people.jpg');
        })->name('download');
        

});



