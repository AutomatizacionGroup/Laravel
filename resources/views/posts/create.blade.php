@extends('layout.app')

@section('content')

 <h1>Create Post</h1>

 {!! Form::open(['url' => '/posts']) !!}

 {!! Form::text('title', 'Enter title') !!}

 {!! Form::submit('Click Me!') !!}

 {!! Form::close() !!}





@endsection

