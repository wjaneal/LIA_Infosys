@extends($view==='staff'?'layout_staff':'layout_international')
@section('content')
<table class="table">
@if($select_type === 'student')
<H1>{{$name_data->slname}}, {{$name_data->sfname}}</H1>
@endif
@if($select_type === 'agent')
<H1>{{$name_data->alname}}, {{$name_data->afname}}</H1>
@endif
<tr><th>Date<th>Last Name<th>First Name<th>Type<th>Note<th>Staff Reference
@if($select_type === 'student')
	@foreach($student_data as $note)
		<tr>
		<td>{{$note->date}}
		<td>{{$name_data->slname}}
		<td>{{$name_data->sfname}}	
		<td>Student
		<td>{{$note->note}}
		<td>{{$note->ulname}}
	@endforeach
@endif
@if($select_type === 'agent')
	@foreach($agent_data as $note)
		<tr>
		<td>{{$note->date}}
		<td>{{$name_data->alname}}
		<td>{{$name_data->afname}}
		<td>Agent
		<td>{{$note->note}}
		<td>{{$note->ulname}}
	@endforeach
@endif
@stop
