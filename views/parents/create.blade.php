@extends($view==='staff' ? 'layout_staff' : 'layout_international')
@section('content')
<h1>Add a New Parent</h1>
{{ HTML::ul($errors->all()) }}
{{ Form::open(array('url' => 'parents')) }}
	 <div class="form-group">
                {{ Form::label('lname', 'Family Name') }}
                {{ Form::text('lname', Input::old('lname'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
                {{ Form::label('fname', 'Name') }}
                {{ Form::text('fname', Input::old('fname'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
                {{ Form::label('dob', 'Date of Birth (YYYY-MM-DD)') }}
                {{ Form::input('dob', 'dob') }}
        </div>
        <div class="form-group">
                {{ Form::label('parent', 'Father or Mother') }}
                {{ Form::select('parent', array(' '=> 'Select a Parent', 'Father'=> 'Father', 'Mother'=>'Mother'), array('class' => 'form-control')) }}
        </div>
 	<div class="form-group">
                {{ Form::label('address1', 'Address') }}
                {{ Form::text('address1', Input::old('address1'), array('class' => 'form-control')) }}
        </div>
 	<div class="form-group">
                {{ Form::label('city', 'City') }}
                {{ Form::text('city', Input::old('city'), array('class' => 'form-control')) }}
        </div>
	<div class="form-group">
                {{ Form::label('state', 'State') }}
                {{ Form::text('state', Input::old('state'), array('class' => 'form-control')) }}
        </div>

	<div class="form-group">
                {{ Form::label('country', 'Country') }}
                {{ Form::text('country', Input::old('country'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
                {{ Form::label('postalcode', 'Postal Code') }}
                {{ Form::text('postalcode', Input::old('postalcode'), array('class' => 'form-control')) }}
        </div>
         <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
                {{ Form::label('phone', 'Phone') }}
                {{ Form::text('phone', Input::old('phone'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
                {{ Form::label('fax', 'Second Phone') }}
                {{ Form::text('fax', Input::old('fax'), array('class' => 'form-control')) }}
        </div>
 {{ Form::submit('Add New Parent', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}

</div>
</body>
</html>
@stop

