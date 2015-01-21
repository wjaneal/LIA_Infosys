@extends("layout")
@section("content")
<p> Here are the users in the table:  
	@foreach($users_table as $user)
		<p>{{{$user->id.", ".$user->username}}}
	@endforeach
@stop
