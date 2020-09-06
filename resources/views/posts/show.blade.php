@extends('layout.app')

@section('content')



<h1>This is Post id: {{$post->id}}</h1>

        <h2>Post title:   <a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></h2>
@endsection

