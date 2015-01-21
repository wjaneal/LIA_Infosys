@extends('layout_international')
@section('content')
<H1>Edit Class</H1>
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}
{{ Form::model($class, array('route' => array('classes.update', $class->id), 'method' => 'PUT')) }}
<table padding=2 class="table">
        <tr>
                <td>
                <div class="form-group">
                        {{ Form::label('teacher', 'Teacher') }}
                        {{ Form::select('teacher', $teachers, Input::old('teacher'), array('class' => 'form-control')) }}
                </div>
                </td>
                <td>
                <div class="form-group">
                        {{ Form::label('code', 'Code') }}
                        {{ Form::text('code', Input::old('code'), array('class' => 'form-control')) }}
                </div>
                </td>
        </tr>
                <td>
                <div class="form-group">
                        {{ Form::label('period', 'Period') }}
                        {{ Form::select('period', $periods, Input::old('period'), array('class' => 'form-control')) }}
                </div>
                </td>
        <tr>
</table>
{{ Form::submit('Edit Class', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@stop
