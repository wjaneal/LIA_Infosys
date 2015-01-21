@extends(Auth::user()->type == 'admin' ? 'layout_international':'layout_agent')
@section('content')
<table class="table">
	@foreach($studentdocs as $studentdoc)
		@foreach($students as $student)
			@if($student->id === $studentdoc->sid)
				<tr><td><H3>{{$student->slname}}, {{$student->sfname}}</H3><tr>
				@foreach($documents as $key=>$value)
					@if($student->id === $value->sid)
						<td>{{$value->description}}
					
					<td><a class ="btn btn-small btn-info" href="{{URL::asset('uploads/'.$value->filename)}}">Open File</a>
						


  <!-- we will also add show, edit, and delete buttons -->
                      			<td>
                                <!-- delete the document (uses the destroy method DESTROY /documents/{id} -->
                               <!-- we will add this later since its a little more complicated than the other two buttons -->
                               {{ Form::open(array('url' => 'documents/' . $value->id, 'class' => 'pull-right')) }}
                                       {{ Form::hidden('_method', 'DELETE') }}
                                       {{ Form::submit('Delete Record', array('class' => 'btn btn-warning')) }}
                               {{ Form::close() }}
                                <!-- edit this document (uses the edit method found at GET /documents/{id}/edit -->
                               <a class="btn btn-small btn-info" href="{{ URL::to('documents/' . $value->id . '/edit') }}">Edit this Document</a>
				@endif
                        </td>
               </tr>
				@endforeach
			@endif
		@endforeach
        @endforeach
</table>
@stop

