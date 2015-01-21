@extends($view==="staff" ? "layout_staff" : "layout_international")
@section("content")
<table border = 2 class="table">
		<tr><th>Surname<th>Name<th>Student(s)<th>Actions
	@foreach($parents as $key => $value)
		<tr>
			<td>{{ $value->lname }}</td>
			<td>{{ $value->fname }}</td>
			<!-- we will also add show, edit, and delete buttons -->
			@if($filled = "")@endif
			<td>
			@foreach($students as $student)
				@if($student->parent1 === $value->id)
					{{$student->slname}}, {{$student->sfname}}
					@if($filled = "Filled")@endif
				@endif
				@if($student->parent2 === $value->id)
					{{$student->slname}}, {{$student->sfname}}
					@if($filled = "Filled")@endif
				@endif
			@endforeach
			@if($filled != 'Filled')
				Not Linked with a Student
			@endif

			<td>
				<!-- delete the parent (uses the destroy method DESTROY /parents/{id} -->
				<!-- we will add this later since its a little more complicated than the other two buttons -->
		{{ Form::open(array('url' => 'parents/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete Record', array('class' => 'btn btn-warning', 'onsubmit' => 'confirm')) }}
				{{ Form::close() }}

				<!-- show the parent (uses the show method found at GET /parents/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('parents/' . $value->id) }}">Show this Parent</a>

				<!-- edit this parent (uses the edit method found at GET /parents/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('parents/' . $value->id . '/edit') }}">Edit this Parent</a>

			</td>
		</tr>
	@endforeach
</table>
@stop


 
 

