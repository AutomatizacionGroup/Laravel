<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Post;
use App\User;
use App\Role;

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

// Route::get('/read', function () {

//    $results = DB::select('select * from posts where id = ?', [1]);


//             return var_dump($results);

//         // foreach ($results as $post) {



//         //         return $post->title; }




// });

// Route::get('/update', function () {


//     $updated = DB::update('update posts set title = "Updated Title" where id = ?', [ 1 ]);

//         return $updated;

// });

// Route::get('/delete', function () {

//     $deleted= DB::delete('delete from posts where id = ?', [1]);

//     return $deleted;

// });
/*
|--------------------------------------------------------------------------
| Eloquent ORM (object relational Model)
|--------------------------------------------------------------------------
|

*/

Route::get('/read', function () {

    $posts = post::all();

    foreach ($posts as $post) {
        return $post->title;
    }

});

// Route::get('/find/{id}', function ($id) {

//     $post = Post::find($id);

//             return $post->title;


// });

// route::get('/findwhere/{id}', function($id){

//     $posts= Post::where('id', $id)
//         ->orderBy('id', 'desc')
//         ->take(1)
//         ->get();

//         return $posts;

// });

// Route::get('/findmore/{id}', function($id){

//     // $posts=Post::findOrFail($id);

//     // return $posts;

// $posts=Post::where('users_count', '<', $id)->firstOrFail();



// });
/*
|--------------------------------------------------------------------------
| Eloquent ORM (object relational Model) crear un nuevo record
|--------------------------------------------------------------------------
|

*/

Route::get('/basicinsert/{id}', function ($id) {

    $post = new Post;

    $post->title = "this is the post with title ID: $id";

    $post->content = "wow eloquent is really whatever and really cool $id";

    $post->save();

});

/*
|--------------------------------------------------------------------------
| Eloquent ORM (object relational Model) Actualizar un nuevo record
|--------------------------------------------------------------------------
|

// */
// Route::get('/replace/{id}/{Cont}', function ($id,$cont) {

//     $post = Post::find($id);

//     $post->title = "this is the post with title ID: $cont en el ID: $id";

//     $post->content = "wow eloquent is  $cont en el registro $id";

//     $post->save();

// });
/*
|--------------------------------------------------------------------------
| Eloquent ORM (object relational Model) crear datos
|--------------------------------------------------------------------------
|

// */

Route::get('/create/{userid}/{title}/{content}', function ($userid,$title,$content) {

    $post = post::create(['user_id'=>$userid,'title'=>$title,'content'=>$content]);

    return $post;


});
/*
|--------------------------------------------------------------------------
| Eloquent ORM (object relational Model) update
|--------------------------------------------------------------------------
|

// */

// Route::get('/update/{id}', function ($id) {


//     Post::where('id', $id)
//         ->where('is_admin', 0 )
//         ->update([
//             'title'=>'Nuevo Titulo '.$id,
//             'content'=>'Contenido numero '.$id.' super magnifico'

//         ]);

// });

/*
|--------------------------------------------------------------------------
| Eloquent ORM (object relational Model) delete
|--------------------------------------------------------------------------
|

// */
// Route::get('/delete/{id}', function ($id) {


//         // $post = Post::find($id);
//         // $post->delete();

//            Post::destroy($id);

// });
/*
|--------------------------------------------------------------------------
| Eloquent ORM (object relational Model) delete con softdelete
|--------------------------------------------------------------------------
|

// */

Route::get('/softdelete/{id}', function ($id) {

    Post::find($id)->delete();

});


Route::get('/readsoftdelete', function () {

    // $post= Post::all();
    // return $post;

    $post = Post::onlyTrashed()
            ->get();

    return $post;

});

/*
|--------------------------------------------------------------------------
| Eloquent ORM (object relational Model) delete con softdelete
|--------------------------------------------------------------------------
|

// */

Route::get('/restore/{id}', function ($id) {

    Post::withTrashed()
        ->where('id',$id)
        ->restore();

});


/*
|--------------------------------------------------------------------------
| Eloquent ORM (object relational Model) permanent delete
|--------------------------------------------------------------------------
|

// */

Route::get('/forcedelete/{id}', function ($id) {

    Post::onlyTrashed()
    ->where('id',$id)
    ->forceDelete();

});

/*
|--------------------------------------------------------------------------
| Eloquent ORM (object relational Model) relations  One to One relationship hasOne
|--------------------------------------------------------------------------
|

// */

Route::get('/user/{id}/post', function ($id) {

    $post = User::find($id)->post;
    $username = User::find($id)->name;
    return "title: ".$post->title." Content: ".$post->content."  Autor: ".$username;
    //return $post->content;
});

/*
|--------------------------------------------------------------------------
| Eloquent ORM (object relational Model) relations  One to One relationship belongsTo
|--------------------------------------------------------------------------
|

// */

Route::get('/post/{id}/user', function($id) {

    return Post::find($id)->user->name;

});

/*
|--------------------------------------------------------------------------
| Eloquent ORM (object relational Model) relations  One to many
|--------------------------------------------------------------------------
|

// */

Route::get('/user/{id}/posts', function ($id) {

    $user = User::find($id)->roles()->orderBy('id','desc')->get();

    // foreach ($user->posts as $post) {

    //     echo $post->title . "<br>";
    // }
        return $user;

});

/*
|--------------------------------------------------------------------------
| Eloquent ORM (object relational Model) relations  many to many
|--------------------------------------------------------------------------
|

// */

Route::get('/user/{id}/role', function ($id) {

    $user = User::find($id);

    foreach ($user->roles as $role) {

        echo $role->name."<br>";
    }

});
