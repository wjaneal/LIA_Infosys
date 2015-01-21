@extends('layout')
@section('content')

<table>
@foreach($student_steps as $value)
	<tr>
	<td>{{$value->student_id}}
	<td>{{$value->step_id}}
	<td>{{$value->teacher_id}}
	<td>{{$value->date}}
	<td>{{$value->step}}
@endforeach
</table>



@stop
