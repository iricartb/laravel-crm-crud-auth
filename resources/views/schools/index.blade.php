@extends('layouts.crm')

@section('title', 'Schools')

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

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
           <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Address</td>
					<td>Phone</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($schools as $key => $value)
                    <tr>
                        <td style="width:5%">{{ $value->id }}</td>
                        <td style="width:20%">{{ $value->name }}</td>
						<td style="width:35%">{{ $value->address }}</td>
						<td style="width:10%">{{ $value->phone }}</td>
                        <td style="width:30%">
                           <a class="btn btn-small btn-success" style="display:inline" href="{{ URL::to('schools/' . $value->id) }}">Details</a>
                           <a class="btn btn-small btn-info" style="display:inline" href="{{ URL::to('schools/' . $value->id . '/edit') }}">Edit</a>
						
                          {{ Form::open(array('url' => 'schools/' . $value->id, 'class' => 'pull-right', 'style' => 'display:inline')) }}
                             {{ Form::hidden('_method', 'DELETE') }}
                             {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                          {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
		
		{{ $schools->links() }}
    </div>
@stop