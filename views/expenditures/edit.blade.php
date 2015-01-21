@extends("layout")
@section("content")
<h1>Edit Expenditures</h1
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}
{{ Form::model($expenditures, array('route' => array('expenditures.update', $expenditures->id), 'method' => 'PUT')) }}

	<div class="form-group">
                {{ Form::label('subcategory', 'Sub-Cateogry') }}
                {{ Form::select('subcategory', $subcategory_options, Input::old('subcategory'), array('class' => 'form-control')) }}
        </div>
	<div class="form-group">
                {{ Form::label('amount', 'Amount') }}
                {{ Form::select('amount', , Input::old('amount'), array('class' => 'form-control')) }}
        </div>
	<div class="form-group">
                {{ Form::label('date', 'Date') }}
                {{ Form::text('date', Input::old('date'), array('class' => 'form-control')) }}
        </div>
	<div class="form-group">
                {{ Form::label('description', 'Description') }}
                {{ Form::text('description', Input::old('description'), array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Submit Changes', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop
