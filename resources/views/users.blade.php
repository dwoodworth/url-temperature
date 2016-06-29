@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Top Users</div>

                <div class="panel-body">
	                <?php
						$users = DB::select(DB::raw("SELECT @rank := @rank + 1 rank, t.* FROM (SELECT @rank:=0) r, (SELECT name, COUNT(*) AS count FROM users,access_logs WHERE users.id = access_logs.user_id GROUP BY user_id ORDER BY count DESC) t"));
					?>
		            <table class="table table-striped">
			            <thead>
				            <th>
					           User
				            </th>
				            <th>
					           Rank
				            </th>
				            <th>
					            Number of Logins
				            </th>
			            </thead>
			            @foreach ($users as $user)
			            	<tr>
				            	<td>
					            	<i class="fa fa-user" aria-hidden="true"></i> {{$user->name}}
				            	</td>
				            	<td>
					            	<i class="fa fa-hashtag" aria-hidden="true"></i> <span class="badge">{{$user->rank}}</span>
				            	</td>
				            	<td>
					            	<i class="fa fa-sign-in" aria-hidden="true"></i> {{$user->count}}
				            	</td>
			            	</tr>
			            @endforeach
		            </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
