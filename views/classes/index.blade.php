@extends('layout_international')
@section('content')
<H1>{{GlobalHelpers::showGlobal(('schoolname'))}}</H1>
<H2>List of Classes</H2>
<table class='table'>
	<tr><th>Teacher<th>Code<th>Period<th>Attendance
@foreach($classes as $class)
	<tr><td>{{$class->ulname}}<td>{{$class->code}}<td>{{$class->period}}<td>
 				{{ Form::open(array('url' => 'attendance/create' . $class->id, 'class' => 'pull-right')) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::submit('Take Attendance', array('class' => 'btn btn-warning')) }}
                                {{ Form::close() }}

@endforeach
</table>
@stop
