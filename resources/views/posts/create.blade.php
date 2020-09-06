@extends('layout.app')

@section('content')

 <h1>Create Post</h1>

        {!! Form::open      (['route' => 'posts.store']) !!}
            <div class="form-group">
                {!! Form::label     ('title', 'Title') !!}
                {!! Form::text      ('title', '', ['class'=>'form-control'] ) !!}
                <br>
                {!! Form::label     ('content', 'Content') !!}
                {!! Form::text      ('content' , '', ['class'=>'form-control'] ) !!}
                <br>
            </div>
            <div class="form-group">
                {!! Form::submit    ('Create', ['class'=>'btn btn-prymary']  ) !!}
            </div>
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

