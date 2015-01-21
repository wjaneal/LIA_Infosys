@extends('layout_international')
@section('content')
<H1>Create a New Course</H1>
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}
{{ Form::open(array('url' => 'courses')) }}
<table padding=2 class="table">
        <tr>
                <td>
                <div class="form-group">
                        {{ Form::label('title', 'Course Title') }}
                        {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
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
                        {{ Form::label('grade', 'Grade') }}
                        {{ Form::select('grade', array(''=>'', '9'=>'9', '10'=>'10', '11'=>'11', '12'=>'12'), Input::old('snname'), array('class' => 'form-control')) }}
                </div>
                </td>
        <tr>
</table>
{{ Form::submit('Create New Course', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@stop
