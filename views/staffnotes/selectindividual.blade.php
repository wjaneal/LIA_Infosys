@extends($view === 'staff' ? 'layout_staff' : 'layout_international')
@section('content')
{{Form::open(array('url'=>'staffnotes/listindividual'))}}
<h1>Select a Student or an Agent to View</h1>
{{ Form::label('agent', 'Agent') }}
{{ Form::select('agent', $agent_data, Input::old('agent'), array('class' => 'form-control')) }}
{{ Form::label('student', 'Student') }}
{{ Form::select('student', $student_data, Input::old('student'), array('class' => 'form-control')) }}
{{ Form::submit('Select', array('class' => 'btn btn-primary')) }}
{{Form::close()}}
@stop
