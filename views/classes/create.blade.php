@extends('layout_international')
@section('content')
<H1>Create a New Class</H1>
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}
{{ Form::open(array('url' => 'classes')) }}
<table padding=2 class="table">
        <tr>
                <td>
                <div class="form-group">
                        {{ Form::label('tid', 'Teacher') }}
                        {{ Form::select('tid', $teachers, Input::old('tid'), array('class' => 'form-control')) }}
                </div>
                </td>
                <td>
                <div class="form-group">
                        {{ Form::label('code', 'Code') }}
                        {{ Form::select('code', $codes, Input::old('code'), array('class' => 'form-control')) }}
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
{{ Form::submit('Create New Class', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@stop
