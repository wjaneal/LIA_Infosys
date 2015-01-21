@extends('layout')
@section('content')
<h1>Add a New Student</h1>

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
			{{ Form::select('grade', array(' ' => 'Select a Grade', '9' => 'Grade 9', '10' => 'Grade 10 ', '11' => 'Grade 11', '12' => 'Grade 12'), Input::old('grade'), array('class' => 'form-control')) }}
		</div>
		</td>
	</tr>
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
        	        {{ Form::label('country', 'Country') }}
                	{{ Form::text('country', Input::old('country'), array('class' => 'form-control')) }}
	        </div>
		</td>
	</tr>
	<tr>
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
        	        {{ Form::label('parent1', 'Parent 1') }}
                	{{ Form::select('parent1', $parents, Input::old('parent1'), array('class' => 'form-control')) }}
	        </div>
		<td>	
		 <div class="form-group">
        	        {{ Form::label('parent2', 'Parent 2') }}
                	{{ Form::select('parent2', $parents, Input::old('parent2'), array('class' => 'form-control')) }}
	        </div>
		</td>
	</tr>
	<tr>
		<td>
		 <div class="form-group">
        	        {{ Form::label('student_email_1', 'Student Email 1') }}
                	{{ Form::text('student_email_1', Input::old('student_email_1'), array('class' => 'form-control')) }}
	        </div>
		</td>
		<td>
		<div class="form-group">
        	        {{ Form::label('flanguage', 'First Language') }}
                	{{ Form::text('flanguage', Input::old('flanguage'), array('class' => 'form-control')) }}
	        </div>
		</td>
	<tr>
		<td>
		<div class="form-group">
        	        {{ Form::label('immigration', 'Immigration Status') }}
                	{{ Form::select('immigration', array(' '=>'Select a Status', 'Landed'=>'Landed', 'Student Visa'=>'Student Visa', 'Citizen'=>'Citizen'), array('class' => 'form-control')) }}
	        </div>
		</td>
		<td>	
		<div class="form-group">
        	        {{ Form::label('canada_doe', 'Date of Entry to Canada (YYYY-MM-DD)') }}
                	{{ Form::text('canada_doe', Input::old('canada_doe'), array('class' => 'form-control')) }}
	        </div>
		</td>
	</tr>
	<tr>
		<td>
		<div class="form-group">
        	        {{ Form::label('lia_doe', 'Date of Entry to School (YYYY-MM-DD)') }}
                	{{ Form::text('lia_doe', Input::old('lia_doe'), array('class' => 'form-control')) }}
	        </div>
		</td>
		<td>
	        <div class="form-group">
	                {{ Form::label('dob', 'Date of Birth (YYYY-MM-DD)') }}
        	        {{ Form::text('dob', Input::old('dob'), array('class' => 'form-control')) }}
	        </div>
		</td>
	</tr>
	<tr>
		<td>
		 <div class="form-group">
        	        {{ Form::label('assessment_date', 'Assessment Date (YYYY-MM-DD)') }}
                	{{ Form::text('assessment_date', Input::old('assessment_date'), array('class' => 'form-control')) }}
	        </div>
		</td>
		<td>
		 <div class="form-group">
        	        {{ Form::label('education_note', 'Education Note') }}
                	{{ Form::text('education_note', Input::old('education_note'), array('class' => 'form-control')) }}
	        </div>
		</td>
	</tr>
	<tr>
		<td>
		 <div class="form-group">
        	        {{ Form::label('translator', 'Translator') }}
                	{{ Form::select('translator', array(' '=>'Translator?', 'Y'=>'Yes', 'N'=>'No'), Input::old('translator'), array('class' => 'form-control')) }}
	        </div>
		</td>
		<td>
		<div class="form-group">
        	        {{ Form::label('career', 'Career') }}
                	{{ Form::text('career', Input::old('career'), array('class' => 'form-control')) }}
	        </div>
		</td>
	<tr>
		<td>
		 <div class="form-group">
        	        {{ Form::label('recommendations', 'Recommendations') }}
                	{{ Form::text('recommendations', Input::old('recommendations'), array('class' => 'form-control')) }}
	        </div>
		</td>
	</tr>
</table>

	{{ Form::submit('Add New Student', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
@stop
