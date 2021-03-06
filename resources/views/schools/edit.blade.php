@extends('layouts.crm')

@section('title', 'Edit - School')

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

        <h1>Edit - {{ $school->name }}</h1>
		
        <!-- if there are creation errors, they will show here -->
		<div class="errors">
           {{ HTML::ul($errors->all()) }}
        </div>
		
        {{ Form::model($school, array('route' => array('schools.update', $school->id), 'files' => true, 'method' => 'PUT')) }}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', Request::old('name'), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('address', 'Address') }}
                {{ Form::text('address', Request::old('address'), array('class' => 'form-control')) }}
            </div>
			
            <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::email('email', Request::old('email'), array('class' => 'form-control')) }}
            </div>
			
            <div class="form-group">
                {{ Form::label('phone', 'Phone') }}
                {{ Form::text('phone', Request::old('phone'), array('class' => 'form-control')) }}
            </div>
			
            <div class="form-group">
                {{ Form::label('web', 'Web') }}
                {{ Form::text('web', Request::old('web'), array('class' => 'form-control')) }}
            </div>
			
            <div class="form-group">
		    @if ((strlen($school->logo) > 0) && (file_exists(public_path('images/schools/' . $school->logo)))) 
		        <img src="{{'/images/schools/' . $school->logo}}" height="100px"><br>
		    @endif
			
                {{ Form::label('logo', 'Logo') }}
                {{ Form::file('logo', Request::old('logo'), array('class' => 'form-control')) }}
            </div>
		
            {{ Form::submit('Edit School', array('class' => 'btn btn-dark')) }}
        {{ Form::close() }}
		
    </div>
@stop