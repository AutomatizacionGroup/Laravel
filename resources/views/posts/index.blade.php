@extends('layout.app')

@section('content')

<h1>This are the Posts</h1>

<ul>


    @foreach ($posts as $post)

        <li> <a href="{{route('posts.show', $post->id)}}">{{$post->id}} - {{$post->title}}</a></li>

    @endforeach

<br>

<a href="{{route('posts.create')}}">Create new Post</a>


@endsection



