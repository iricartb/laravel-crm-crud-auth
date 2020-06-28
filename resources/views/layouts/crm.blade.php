<!-- Stored in resources/views/layouts/crm.blade.php -->

@extends('layouts.master')

@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <a class="navbar-brand" href="#">Laravel CRM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ (substr_count(Route::currentRouteName(), 'schools') >= 1) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ URL::to('schools') }}">SCHOOLS</a>
                </li>

                <li class="nav-item {{ (substr_count(Route::currentRouteName(), 'students') >= 1) ? 'active' : '' }}">
                    <a class="nav-link disabled" href="{{ URL::to('students') }}">STUDENTS</a>
                </li>
            </ul>
			<ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link disabled" href="{{ URL::to('logout') }}">{{ strtoupper(Auth::user()->name) }} - LOGOUT</a>
                </li>
			</ul>
        </div>
    </nav>
@stop