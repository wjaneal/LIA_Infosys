@extends('layout_international')
@section('content')
<H1>{{GlobalHelpers::showGlobal(('schoolname'))}}</H1>
<H2>Class Lists</H2>
<table class='table'>
	<tr><th>Class<th>Student
@foreach($enrolments as $enrolment)
	<tr><td>{{$enrolment->cid}}<td>{{$enrolment->sid}}
@endforeach
</table>
@stop
