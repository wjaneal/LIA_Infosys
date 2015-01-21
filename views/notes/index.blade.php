@extends($view==='staff'?'layout_staff':'layout_international')
@section('content')
<table class="table">
<tr><th>Date<th>Last Name<th>First Name<th>Type<th>Note
@foreach($noteslist as $note)
	@if($note['referencetype'] === 'students')
			<tr>
			<td>{{$note['note']->date}}
			<td>{{$note[0]->slname}}
			<td>{{$note[0]->sfname}}
			<td>Student
			<td>{{$note['note']->note}}
	@endif
	@if($note['referencetype'] === 'agents')
			<tr>
			<td>{{$note['note']->date}}
			<td>{{$note[0]->alname}}
			<td>{{$note[0]->afname}}
			<td>Agent
			<td>{{$note['note']->note}}
	@endif
@endforeach
@stop
