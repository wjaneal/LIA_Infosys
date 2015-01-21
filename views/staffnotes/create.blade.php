@extends($view==='staff' ? 'layout_staff':'layout_international')
@section('content')
{{ HTML::ul($errors->all()) }}
{{ Form::open(array('url'=>'staffnotes')) }}
<h1>Create a Note</h1>
<h2>Select either a student or an agent for reference:</h2>
{{ Form::label('agent', 'Agent') }}
{{ Form::select('agent', $agents, Input::old('agent'), array('class' => 'form-control')) }}
{{ Form::label('student', 'Student') }}
{{ Form::select('student', $students, Input::old('student'), array('class' => 'form-control')) }}
<h2>Date:</h2>
{{ Form::label('date', 'Date') }}
{{ Form::text('date', Input::old('date'), array('class' => 'form-control')) }}
<h2>Note:</h2>
{{ Form::label('note', 'Note Detail') }}
{{ Form::textarea('note', Input::old('note'), array('class' => 'form-control')) }}
<H2>Note Type:</h2>
{{Form::label('type', 'Note Type')}}
{{Form::select('type', array(''=>'Please select a type','contact'=>'Contact','meeting'=>'Meeting','inquiry'=>'Inquiry'), Input::old('type'), array('class'=>'form-control'))}}
<h2>Optionally attach a file:</h2>
{{Form::label('file', 'Attach File')}}
{{Form::text('file', Input::old('file'), array('class'=>'form-control'))}}
{{ Form::submit('Submit Note', array('class' => 'btn btn-primary')) }}
{{Form::close()}}
@stop
