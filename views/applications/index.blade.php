@extends("layout")
@section("content")
<table border = 2>
	@foreach($applications as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
		<tr>
			<td>{{ $value->slname }}</td>
		<tr>
			<td>{{ $value->sfname }}</td>
		<tr>
			<td>{{$value->country}}</td>
		<tr>
			<td>{{$value->gender}}</td>
		<tr>
			<td>{{$value->street}}</td>
		<tr>
			<td>{{$value->apartment}}</td>
		<tr>
			<td>{{$value->city}}</td>
		<tr>
			<td>{{$value->state}}</td>
		<tr>
			<td>{{$value->postalcode}}</td>
		<tr>
			<td>{{$value->email}}</td>
		<tr>
			<td>{{$value->student_email_1}}</td>
		<tr>
			<td>{{$value->englishlevel}}</td>
		<tr>
			<td>{{$value->fatherfname}}</td>
		<tr>
			<td>{{$value->fatherlname}}</td>
		<tr>
			<td>{{$value->fatherdob}}</td>
		<tr>
			<td>{{$value->fatheraddress}}</td>
		<tr>
			<td>{{$value->fathercountry}}</td>
		<tr>
			<td>{{$value->fatherstate}}</td>
		<tr>
			<td>{{$value->fatherpostalcode}}</td>
		<tr>
			<td>{{$value->fatherphone}}</td>
		<tr>
			<td>{{$value->fatherfax}}</td>
		<tr>
			<td>{{$value->fatheremail}}</td>
		<tr>
			<td>{{$value->motherfname}}</td>
		<tr>
			<td>{{$value->motherlname}}</td>
		<tr>
			<td>{{$value->motherdob}}</td>
		<tr>
			<td>{{$value->motheraddress}}</td>
		<tr>
			<td>{{$value->mothercountry}}</td>
		<tr>
			<td>{{$value->motherstate}}</td>
		<tr>
			<td>{{$value->motherpostalcode}}</td>
		<tr>
			<td>{{$value->motherphone}}</td>
		<tr>
			<td>{{$value->motherfax}}</td>
		<tr>
			<td>{{$value->motheremail}}</td>
		<tr>
			<td>{{$value->account_name}}</td>
		<tr>
			<td>{{$value->encrypt_pass}}</td>
		<tr>
			<td>{{$value->picture_location}}</td>
		<tr>
			<td>{{$value->flanguage}}</td>
		<tr>
			<td>{{$value->immigration}}</td>
		<tr>
			<td>{{$value->dob}}</td>
		<tr>
			<td>{{$value->last_login}}</td>
		<tr>
			<td>{{$value->applicationfee}}</td>
		<tr>
			<td>{{$value->deposit}}</td>
		<tr>
			<td>{{$value->visaaccepted}}</td>
		<tr>
			<td>{{$value->arrived}}</td>

			
			
			

			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- delete the student (uses the destroy method DESTROY /students/{id} -->
				<!-- we will add this later since its a little more complicated than the other two buttons -->
				{{ Form::open(array('url' => 'applications/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete Record', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}

				<!-- show the student (uses the show method found at GET /students/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('applications/' . $value->id) }}">Show this Applicant</a>

				<!-- edit this student (uses the edit method found at GET /students/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('applications/' . $value->id . '/edit') }}">Edit this Applicant</a>

			</td>
		</tr>
	@endforeach
</table>
@stop

 
 
 

