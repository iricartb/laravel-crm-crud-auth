@extends('layouts.crm')

@section('title', 'View - Student')

@section('content')
    <div class="container">

        <nav class="navbar navbar-dark bg-dark" style="border-radius:4px; margin-top:20px; margin-bottom:40px;">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('students') }}">Students</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a style="color: white" href="{{ URL::to('students') }}">View All Students</a></li>
                <li><a style="color: white" href="{{ URL::to('students/create') }}">Create a Student</a>
            </ul>
        </nav>

        <h1>{{ $student->name }} {{ $student->surnames }}</h1>

        <div class="jumbotron text-center">
            <h2>{{ $student->name }} {{ $student->surnames }}</h2>
            <p>
                <strong>Name:</strong> {{ $student->name }}<br>
			    <strong>Surnames:</strong> {{ $student->surnames }}<br>
			    <strong>Birthdate:</strong> {{ $student->birthdate }}<br>
			    <strong>City:</strong> {{ $student->city }}<br>
				<strong>School:</strong> {{ (!is_null($student->school_id)) ? App\Models\School::find($student->school_id)->name : '' }}<br>
            </p>
        </div>
    </div>
@stop