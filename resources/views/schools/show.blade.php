@extends('layouts.crm')

@section('title', 'View - School')

@section('content')
    <div class="container">

        <nav class="navbar navbar-dark bg-dark" style="border-radius:4px; margin-top:20px; margin-bottom:40px;">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('schools') }}">Schools</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a style="color: white" href="{{ URL::to('schools') }}">View All Schools</a></li>
                <li><a style="color: white" href="{{ URL::to('schools/create') }}">Create a School</a>
            </ul>
        </nav>

        <h1>{{ $school->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $school->name }}</h2>
		
		@if ((strlen($school->logo) > 0) && (file_exists(public_path('images/schools/' . $school->logo)))) 
		    <br><img src="{{'/images/schools/' . $school->logo}}" height="200px"><br><br>
		@endif
		
        <p>
            <strong>Address:</strong> {{ $school->address }}<br>
			<strong>Email:</strong> {{ $school->email }}<br>
			<strong>Phone:</strong> {{ $school->phone }}<br>
			<strong>Web:</strong> {{ $school->web }}<br>
        </p>
    </div>
		
    </div>
@stop