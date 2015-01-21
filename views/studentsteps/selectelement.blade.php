@extends('layout')
@section('content')
<h1>STEP Section Evaluation</h1>
<H3>Select a STEP Section to Evaluate</H3>
{{Form::model('Studentstep', ['route' => 'studentsteps/assesselement'])}}
{{Form::select('choices', $choices, array('class'=>'form-control'))}}
<h3>Please select a student.</h3>
{{Form::select('student', $students, array('class'=>'form-control'))}}
{{Form::submit('Submit Assessment')}}
{{Form::close()}}
@stop
