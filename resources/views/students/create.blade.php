@extends('layouts.crm')

@section('title', 'Create - Student')

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

        <h1>Create - Student</h1>
		
        <!-- if there are creation errors, they will show here -->
		<div class="errors">
           {{ HTML::ul($errors->all()) }}
        </div>
		
        {{ Form::open(array('url' => 'students')) }}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', Request::old('name'), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('surnames', 'Surnames') }}
                {{ Form::text('surnames', Request::old('surnames'), array('class' => 'form-control')) }}
            </div>
			
            <div class="form-group">
                {{ Form::label('birthdate', 'Birthdate') }}
                {{ Form::date('birthdate', Request::old('birthdate'), array('class' => 'form-control')) }}
            </div>
			
            <div class="form-group">
                {{ Form::label('city', 'City') }}
                {{ Form::text('city', Request::old('city'), array('class' => 'form-control')) }}
            </div>
			
            <div class="form-group">
                {{ Form::label('school_id', 'School') }}
                {{ Form::select('school_id', App\Models\School::where('id' ,'>' ,0)->pluck('name', 'id')->toArray(), null, array('class' => 'form-control')) }}
            </div>
			
            {{ Form::submit('Create Student', array('class' => 'btn btn-dark')) }}
        {{ Form::close() }}
		
    </div>
@stop