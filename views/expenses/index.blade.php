@extends($view==="staff" ? "layout_staff" : "layout_international")
@section("content")
<H1>Invoices</H1>
<table border = 2 class="table">
	@foreach($expenses as $item)
		<tr>
		@foreach($students as $student)
			@if($student->id === $item->sid)
			<td>{{ $student->slname.", ".$student->sfname }}</td>
			<td>{{ $item->date }} </td>
			@endif
		@endforeach
			<!-- we will also add show, edit, and delete buttons -->
<td>

				<!-- delete the student (uses the destroy method DESTROY /students/{id} -->
				<!-- we will add this later since its a little more complicated than the other two buttons -->
				{{ Form::open(array('url' => 'expenses/' . $item->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete Record', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}

				<!-- show the student (uses the show method found at GET /students/{id} -->
				<a class="btn btn-small btn-success" href="{{URL::asset('invoices/'.$item->filename.'')}}">Show this Invoice</a>

				<!-- edit this student (uses the edit method found at GET /students/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('expenses/' . $item->id . '/edit') }}">Edit this Invoice</a>

			</td>
		</tr>
	@endforeach
</table>
@stop

 
 
 

