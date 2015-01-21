@extends("layout")
@section("content")
<h1>Edit Document</h1>
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

@foreach($students as $student)
	@if($student->id === $documents->sid)
		<H2>{{$student->slname}}, {{$student->sfname}}</H2>
	@endif
@endforeach
	



{{ Form::model($documents, array('route' => array('documents.update', $documents->id), 'method' => 'PUT')) }}

	<div class="form-group">
                {{ Form::label('sid', 'Name') }}
                {{ Form::select('sid', $student_options, Input::old('sid'), array('class' => 'form-control')) }}
        </div>
	<div class="form-group">
                {{ Form::label('type', 'Document Type') }}
                {{ Form::select('type', array('Passport'=>'Passport', 'Visa'=>'Visa', 'Study Permit'=>'Study Permit', 'Other'=>'Other'), Input::old('type'), array('class' => 'form-control')) }}
        </div>
	<div class="form-group">
                {{ Form::label('expiry', 'Expiry Date') }}
                {{ Form::text('expiry', Input::old('expiry'), array('class' => 'form-control')) }}
        </div>
	<div class="form-group">
                {{ Form::label('description', 'Description') }}
                {{ Form::text('description', Input::old('description'), array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Submit Changes', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop
