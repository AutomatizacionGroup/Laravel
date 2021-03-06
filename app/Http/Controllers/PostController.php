<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\MagicConst\Function_;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::culo();


        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
/*         $this->validate($request, [
            'title'=>'required|max:30',
            'content'=>'required'
        ]); */

        // 1 way of doing it!
        Post::create($request->all());

        return redirect('/posts');

        //Another way is
        // $input = $request->all();
        // $input['title'] = $request->title;
        // Post::create($request->all());

        // and then Another one
        // $post = new Post;
        // $post->title = $request->title;
        // $post->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $post = Post::findOrFail($id);

            return view('posts.edit', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'required',
            'content'=>'required'
        ]);
        $post = Post::findOrFail($id);

        $post->update($request->all());

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id)->delete();
        return redirect('/posts');

    }


    public Function contact(){

        $people = ['Edwin','Jose','Maria','Peter'];

        return view('contact', compact('people'));

    }


    public Function show_post($id,$name,$password){


        return view('post', compact('id','name', 'password') );

    }



}
