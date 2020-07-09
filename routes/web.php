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

Route::get('/', function () {
    return view('wellcome');
});

// Route::get('/page', function () {
//     return view('page');
// });

// Route::get('/about', function () {
//     return "Hi Iam About";
// });

// Route::get('/contact', function () {
//     return "I am Contact";
// });

// Route::get('/post/{id}', 'PostController@index');

// Route::resource('posts','PostController');

// Route::get('/contact', 'PostController@contact');

// Route::get('post/{id}/{name}/{paswword}', 'PostController@show_post');

/* Route::get('admin/posts/example', array('as' => 'admin.home',function(){

       $url = route('admin.home');


        return "this url is ". $url;

})); */

// Route::get('/insert', function () {

//     DB::insert('insert into posts (title, content) values (?, ?)', ['este es el primer texto', 'que pondre por el dia de hoy']);

// });

Route::get('/read', function () {

   $results = DB::select('select * from posts where id = ?', [1]);


            return var_dump($results);

        // foreach ($results as $post) {



        //         return $post->title; }




});
