# This Source Code Form is subject to the terms of the Mozilla Public
# License, v. 2.0. If a copy of the MPL was not distributed with this
# file, You can obtain one at http://mozilla.org/MPL/2.0/.@extends('layout_international')
@section('content')
<h1>Apply Now!</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'students')) }}
<table padding=2 class="table">
	<tr>
		<td>
		<div class="form-group">
			{{ Form::label('slname', 'Family Name') }}
			{{ Form::text('slname', Input::old('slname'), array('class' => 'form-control')) }}
		</div>
		</td>
		<td>
		<div class="form-group">
			{{ Form::label('sfname', 'Name') }}
			{{ Form::text('sfname', Input::old('sfname'), array('class' => 'form-control')) }}
		</div>
		</td>
	</tr>
		<td>
		<div class="form-group">
			{{ Form::label('snname', 'Nickname') }}
			{{ Form::text('snname', Input::old('snname'), array('class' => 'form-control')) }}
		</div>
		</td>
	<tr>	
		<td>
		<div class="form-group">
                	{{ Form::label('gender', 'Gender') }}
	                {{ Form::select('gender', array(' '=> 'Select a Gender', 'F'=> 'Female', 'M'=>'Male'), array('class' => 'form-control')) }}
	        </div>
		</td>
		<td>
		<div class="form-group">
			{{ Form::label('grade', 'Grade') }}
			{{ Form::select('grade', array(0 => 'Select a Grade', 9 => 'Grade 9', 10 => 'Grade 10 ', 11 => 'Grade 11', 12 => 'Grade 12'), Input::old('grade'), array('class' => 'form-control')) }}
		</div>
		</td>
	</tr>
@if($view != 'STEP')	
	<tr>
		<td>
		<div class="form-group">
        	        {{ Form::label('address', 'Address') }}
                	{{ Form::text('address', Input::old('address'), array('class' => 'form-control')) }}
	        </div>
		<td>
		<div class="form-group">
        	        {{ Form::label('city', 'City') }}
                	{{ Form::text('city', Input::old('city'), array('class' => 'form-control')) }}
	        </div>
		</td>
	</tr>
	<tr>
		<td>
		<div class="form-group">
        	        {{ Form::label('postalcode', 'Postal Code') }}
                	{{ Form::text('postalcode', Input::old('postalcode'), array('class' => 'form-control')) }}
	        </div>
		</td>
		<td>
	 	<div class="form-group">
        	        {{ Form::label('state', 'State / Province') }}
                	{{ Form::text('state', Input::old('state'), array('class' => 'form-control')) }}
	        </div>
		</td>
	</tr>
	<tr>
		<td>
	 	<div class="form-group">
        	        {{ Form::label('country', 'Country') }}
                	{{ Form::text('country', Input::old('country'), array('class' => 'form-control')) }}
	        </div>
		</td>
		<td>
		 <div class="form-group">
	                {{ Form::label('phone', 'Phone') }}
        	        {{ Form::text('phone', Input::old('phone'), array('class' => 'form-control')) }}
	        </div>
		</td>
	</tr>
	<tr>
		<td>
		 <div class="form-group">
        	        {{ Form::label('student_email_1', 'Email') }}
                	{{ Form::text('student_email_1', Input::old('student_email_1'), array('class' => 'form-control')) }}
	        </div>
		</td>
		<td>
	        <div class="form-group">
	                {{ Form::label('dob', 'Date of Birth (YYYY-MM-DD)') }}
        	        {{ Form::text('dob', Input::old('dob'), array('class' => 'form-control')) }}
	        </div>
		</td>

	{{ Form::submit('Add New Student', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
@stop
