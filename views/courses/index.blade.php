@extends('layout_international')
@section('content')
<H1>{{GlobalHelpers::showGlobal(('schoolname'))}}</H1>
<H2>List of Courses</H2>
<table>
	<tr><th>Title<th>Code<th>Grade
@foreach($courses as $course)
	<tr><td>{{$course->title}}<td>{{$course->code}}<td>{{$course->grade}}
@endforeach
@stop
