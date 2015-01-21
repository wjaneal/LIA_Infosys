@extends('layout_international')
@section('content')
<H1>Take Attendance - {{$class}}</H1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}
{{ Form::open(array('url' => 'attendance')) }}
{{Form::hidden('class', $class)}}
<table padding=2 class="table">
	@foreach($students as $id=>$student)
        <tr>
                <td>{{$student}}
		<td>
                <div class="form-group">
                        {{ Form::label('entry', 'Entry') }}
                        {{ Form::select('entry[]', array('P'.$id=>'P', 'L'.$id=>'L', 'A'.$id=>'A'), Input::old('entry'), array('class' => 'form-control')) }}
                </div>
                </td>
	@endforeach
</table>
{{ Form::submit('Submit Attendance', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@stop
