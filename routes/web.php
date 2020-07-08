<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/page', function () {
    return view('page');
});

Route::get('/about', function () {
    return "Hi Iam About";
});

Route::get('/contact', function () {
    return "I am Contact";
}); */

// Route::get('/post/{id}', 'PostController@index');

Route::resource('posts','PostController');

Route::get('/contact', 'PostController@contact');

Route::get('post/{id}/{name}/{paswword}', 'PostController@show_post');

/* Route::get('admin/posts/example', array('as' => 'admin.home',function(){

       $url = route('admin.home');


        return "this url is ". $url;

})); */
