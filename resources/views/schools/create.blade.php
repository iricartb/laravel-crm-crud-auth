@extends('layouts.crm')

@section('title', 'Create - School')

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

        <h1>Create - School</h1>
		
        <!-- if there are creation errors, they will show here -->
		<div class="errors">
           {{ HTML::ul($errors->all()) }}
        </div>
		
        {{ Form::open(array('url' => 'schools', 'files' => true)) }}

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
                {{ Form::label('logo', 'Logo') }}
                {{ Form::file('logo', Request::old('logo'), array('class' => 'form-control')) }}
            </div>
			
            {{ Form::submit('Create School', array('class' => 'btn btn-dark')) }}
        {{ Form::close() }}
		
    </div>
@stop