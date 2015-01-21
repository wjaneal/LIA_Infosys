@extends('layout_international')
@section('content')
<H1>Create a New Enrolment</H1>
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}
{{ Form::open(array('url' => 'enrolments')) }}
<table padding=2 class="table">
        <tr>
                <td>
                <div class="form-group">
                        {{ Form::label('cid', 'Class') }}
                        {{ Form::select('cid', $classes, Input::old('cid'), array('class' => 'form-control')) }}
                </div>
                </td>
                <td>
                <div class="form-group">
                        {{ Form::label('sid', 'Student') }}
                        {{ Form::select('sid', $students, Input::old('sid'), array('class' => 'form-control')) }}
                </div>
                </td>
</table>
{{ Form::submit('Create New Enrolment', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@stop
