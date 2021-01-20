@extends('layouts.app')

@section('content')
    <style>
        p{
            color:black;
            font-style:italic;
            font-size:20px;
        }
        fieldset{
            border:1px solid black;
        }
        legend{
            color:black;
            font-weight:bold;
            font-size:20px;
        }
        fieldset{
            padding:5%;
        }

    </style>
    <div class="inner">
        <div class="content">
            <header>
                <center><h1>{{$title}}</h1></center>
            </header>
            
            @foreach($courses as $course)
                
                <fieldset>
                <legend>Course name: {{$course->Label}}</legend>
               
                <p>Starts: {{$course->Starts}}</p>
                <p>Ends: {{$course->Ends}}</p>
                <p>Organization: {{$course->Organization}}</p>
                <h4>Technology:&nbsp;&nbsp;<img src="{{$course->image}}" width="25px" height="25px"alt=""></h4>
                <h4>Lecturers: @foreach($course->lecturers as $lecturer)
                    {{$lecturer->FirstName}}&nbsp;<img src="{{$lecturer->image}}" width="25px" height="25px"alt="">,
                    @endforeach</h4>
                <h4>Location: {{$course->location->name}}</h4>
                </fieldset>
            @endforeach
            {!! $text !!}
        </div>
    </div>
@endsection