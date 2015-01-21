@extends($view === 'staff' ? "layout_staff" : "layout_international")
@section("content")
@if($view==='agent')
	<H1>Here are your students:</H1>
@endif

<table border = 2 class="table">
	<tr><th>Last Name<th>First Name<th>Grade<th>Country<th>Gender<th>Status<th>Actions
	@foreach($students as $key => $value)
		<tr>
			<td>{{ $value->slname }}</td>
			<td>{{ $value->sfname }}</td>
			<td>{{$value->grade}}</td>
			<td>{{$value->country}}</td>
			<td>{{$value->gender}}</td>
			<td>{{$value->status}}</td>

				
			
			

			<!-- we will also add show, edit, and delete buttons -->
<td>

				<!-- delete the student (uses the destroy method DESTROY /students/{id} -->
				<!-- we will add this later since its a little more complicated than the other two buttons -->
				{{ Form::open(array('url' => 'students/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete Record', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}

				<!-- show the student (uses the show method found at GET /students/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('students/' . $value->id) }}">Show this Student</a>

				<!-- edit this student (uses the edit method found at GET /students/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('students/' . $value->id . '/edit') }}">Edit this Student</a>

			</td>
		</tr>
	@endforeach
</table>
@stop

 
 
 

