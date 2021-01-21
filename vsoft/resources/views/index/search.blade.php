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
            background-color:white;
            border-radius:5%;  
        }
        body{
            background-image:url("https://png.pngtree.com/thumb_back/fw800/background/20190222/ourmid/pngtree-green-fresh-geometric-education-background-design-backgroundfresh-backgroundgeometric-backgroundeducationlearning-image_61172.jpg");
            background-size:100%;
            background-position:fixed;
           
        }
        legend{
            background-color:blue;
            color:white;
            border-radius:30px;
        }
        h1{
            font-size:50px;
            text-shadow:5px -3px 1px gray;
        }
        .parentElement{
            position:relative;
        }
        #searchTextInput{
            background-color:white;
            width:50%;
            margin-right:25%;
        }
       
    </style>
    <center><h1>Your filtered results:</h1></center>
    @foreach($courses as $course)
    <fieldset>
                <legend>Course name: {{$course->Label}}</legend>
               
                <p>Starts: {{$course->Starts}}</p>
                <p>Ends: {{$course->Ends}}</p>
                <p>Organization: {{$course->organization->Name}}</p>
                <div class="parentElement">
                    <h4 style="text-align:right">Technology:&nbsp;&nbsp; 
                        <br>
                        <img  style="float:right;margin-right:1%;" src="{{$course->image}}" width="120px" height="120px" alt=""></h4>
                </div>
                <h4>Lecturers: @foreach($course->lecturers as $lecturer)
                <a href="{{$lecturer->image}}" target="_blank">{{$lecturer->FirstName}}&nbsp;<img src="{{$lecturer->image}}" width="25px" height="25px"alt="">,
                    @endforeach</h4>
                <h4>Location: {{$course->location->name}}</h4>
                </fieldset>
                <br>
    @endforeach
@endsection