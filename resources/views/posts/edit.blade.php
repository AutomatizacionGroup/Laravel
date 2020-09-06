@extends('layout.app')

@section('content')

<h1>Edit Post</h1>


    {!! Form::model($post, ['method'=>'PATCH','route' => ['posts.update', $post->id]]) !!}
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', old('title')  ) !!}
        {!! Form::label('content', 'Content') !!}
        {!! Form::text('content' , old('content')  ) !!}
        <br>
        {!! Form::submit('Update' ) !!}
    {!! Form::close() !!}


    {!! Form::model($post, ['method'=>'DELETE','route' => ['posts.destroy', $post->id]]) !!}
        <br>
        {!! Form::submit('Delete' ) !!}
    {!! Form::close() !!}

    @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif




@endsection
