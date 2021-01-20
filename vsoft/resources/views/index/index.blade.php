@extends('layouts.app')

@section('content')
    <style>
        p{
            color:black;
            font-style:italic;
        }
    </style>
    <div class="inner">
        <div class="content">
            <header>
                <h2>{{$title}}</h2>
            </header>
            
            @foreach($courses as $course)
                <hr>
                <p>Course name: {{$course->Label}}</p>
                <p>Starts: {{$course->Starts}}</p>
                <p>Ends: {{$course->Ends}}</p>
                <p>Organization: {{$course->Organization}}</p>
                <hr>
            @endforeach
            {!! $text !!}
        </div>
    </div>
@endsection