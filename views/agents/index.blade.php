@extends($view==='staff' ? "layout_staff": "layout_international")
@section("content")
<H1>Welcome to the {{GlobalHelpers::showGlobal('schoolname')}} Agent Portal</H1>
<H2>List of Agents</H2>
<table border = 2>
	@foreach($agents as $key => $value)
		<tr>
			<td><strong>Name</strong><td>{{ $value->alname }}, {{ $value->afname }}</td>
			<!-- we will also add show, edit, and delete buttons -->
			<td colspan=2>

				<!-- delete the agent (uses the destroy method DESTROY /agents/{id} -->
				<!-- we will add this later since its a little more complicated than the other two buttons -->
				{{ Form::open(array('url' => 'agents/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete Record', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}

				<!-- show the agent (uses the show method found at GET /agents/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('agents/' . $value->id) }}">Show this Agent</a>

				<!-- edit this agent (uses the edit method found at GET /agents/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('agents/' . $value->id . '/edit') }}">Edit this Agent</a>

			</td>
		</tr>
	@endforeach
</table>
@stop

 
 
 

