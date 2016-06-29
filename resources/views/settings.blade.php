@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Settings</div>

                <div class="panel-body">
	                @include('common.errors')
	                
	                <form action="{{ url('settings/store') }}" method="POST">
		                {{ csrf_field() }}
		                <div class="form-group">
							<label for="exampleInputEmail1">Location</label>
							<input type="text" class="form-control" name="zip" id="zip" placeholder="Zip Code" maxlength="5" autocomplete="off" value="{{ $zip or ''}}">
						</div>
						<div class="pull-right">
							<button type="submit" class="btn btn-primary">Save Changes</button> <a href="/" class="btn btn-default">Cancel</a>
						</div>
					</form>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
