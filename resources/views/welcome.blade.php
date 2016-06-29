@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div id="weather-container" class="jumbotron text-center">
	            <p>
                @if (Auth::guest())
	                <h2>Weather Center</h2>
	                <h4>Please Login</h4>
	            @else
					@include('weather')
                @endif
	            </p>
            </div>
        </div>
    </div>
</div>
@endsection
