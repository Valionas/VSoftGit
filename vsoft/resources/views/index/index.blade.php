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
        select{
            background-color:white;
            width:50%;
        }
        
    </style>
    <div class="inner">
        <div class="content">
            <header>
                <center><h1>{{$title}}</h1></center>
            </header>
            <form action="/search" method="get">
                <div>
                    <input type="text" id="searchTextInput"  name="searchTextInput" style="float: right" placeholder="Search here..." />
                    <br>
                    <br>
                    <br>
                   
                    
                    <center>
                    <h3>Search by criteria</h3>
                    <select name="searchOption">
                        <option value="Label">Course name</option>
                        <option value="Starts">Starts</option>
                        <option value="Ends">Ends</option>
                        <option value="organization_id">Organization by Id (Private Users only)</option>
                        <option value="location_id">Location by Id (Private Users only)</option>

                    </select>
                    </center>
                    <br>
                    <center><input type="submit" id="submitSearch"/></center>
                </div>
            </form>
            <br>
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
                {{$lecturer->FirstName}}&nbsp;<img src="{{$lecturer->image}}" width="25px" height="25px"alt="">,
                    @endforeach</h4>
                <h4>Location: {{$course->location->name}}</h4>
                </fieldset>
                <br>
            @endforeach
           
        </div>
    </div>
@endsection