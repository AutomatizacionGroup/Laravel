@extends('layout.app')

@section('content')

<h1>Edit Post</h1>

        {{-- {!! Form::open(['url' => '/posts/{{$post->id}}']) !!} --}}
            <form method="post" action="/posts/{{$post->id}}">

                {{csrf_field()}}

                <input type="hidden" name="_method" value="PUT">

                <input type="text" name="title" placeholder="Enter title" value="{{$post->title}}">

                <input type="submit" name="submit" value="UPDATE">


            </form>

        {{-- {!! Form::open(['url' => '/posts/{{$post->id}}']) !!} --}}
            <form method="post" action="/posts/{{$post->id}}">

                {{csrf_field()}}

                <input type="hidden" name="_method" value="DELETE">

                <input type="submit" name="delete" value="DELETE">

            </form>




@endsection
