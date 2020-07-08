@extends('layout.app')

@section('content')



<h1> Contact Page</h1>

@if (count($people))
    <ul>
        @foreach ($people as $person)



                <li>{{$person}}</li>

                <script>alert('Hello {{$person}}')</script>


        @endforeach
    </ul>
@endif

@stop


@section('footer')

{{-- <script>alert('Hello everybody and wellcome to the jungle')</script> --}}

@endsection
