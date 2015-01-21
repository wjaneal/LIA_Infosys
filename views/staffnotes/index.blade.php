@extends($view==='staff'?'layout_staff':'layout_international')
@section('content')
<table class="table">
<tr><th>Date<th>Last Name<th>First Name<th>Type<th>Note<th>Staff Reference
@foreach($noteslist as $note)
	@if($note['referencetype'] === 'students')
			<tr>
			<td>{{$note['note']->date}}
			<td>{{$note['student']['slname']}}
			<td>{{$note['student']['sfname']}}
			<td>Student
			<td>{{$note['note']->note}}
			<td>{{$note['note']->ulname}}
	@endif
	@if($note['referencetype'] === 'agents')
			<tr>
			<td>{{$note['note']->date}}
			<td>{{$note['agent']['alname']}}
			<td>{{$note['agent']['afname']}}
			<td>Agent
			<td>{{$note['note']->note}}
			<td>{{$note['note']->ulname}}

	@endif
@endforeach
</table>
@stop
