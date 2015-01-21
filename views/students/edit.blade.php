@extends($view==='staff' ?  "layout_staff" : "layout_international")
@section("content")
<h1>Edit {{ $students->sfname,' ', $students->slname }}</h1>
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}
{{ Form::model($students, array('route' => array('students.update', $students->id), 'method' => 'PUT')) }}
<table class='table'>
	<tr>
	<td>
        <div class="form-group">
                {{ Form::label('slname', 'Family Name') }}
                {{ Form::text('slname', Input::old('slname'), array('class' => 'form-control')) }}
        </div>
	<td>
        <div class="form-group">
                {{ Form::label('sfname', 'Name') }}
                {{ Form::text('sfname', Input::old('sfname'), array('class' => 'form-control')) }}
        </div>
	<td>
        <div class="form-group">
                {{ Form::label('snname', 'Nickname') }}
                {{ Form::text('snname', Input::old('snname'), array('class' => 'form-control')) }}
        </div>
	<tr>
	<td>
   <div class="form-group">
                {{ Form::label('grade', 'Grade') }}
                {{ Form::select('grade', array(0 => 'Select a Grade', 9 => '9', 10 => '10', 11 => '11', 12=> '12'), Input::old('grade'), array('class' => 'form-control')) }}
        </div>
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
	<tr>
	<td>
        <div class="form-group">
                {{ Form::label('postalcode', 'Postal Code') }}
                {{ Form::text('postalcode', Input::old('postalcode'), array('class' => 'form-control')) }}
        </div>
	<td>
	 <div class="form-group">
                {{ Form::label('state', 'State / Province') }}
                {{ Form::text('state', Input::old('state'), array('class' => 'form-control')) }}
        </div>
	<td>
 	<div class="form-group">
                {{ Form::label('country', 'Country') }}
                {{ Form::text('country', Input::old('country'), array('class' => 'form-control')) }}
        </div>
	<tr>
	<td>
        <div class="form-group">
                {{ Form::label('phone', 'Phone') }}
                {{ Form::text('phone', Input::old('phone'), array('class' => 'form-control')) }}
        </div>
	<td>
         <div class="form-group">
                {{ Form::label('gender', 'Gender') }}
                {{ Form::select('gender', array(' '=> 'Select a Gender', 'F'=> 'Female', 'M'=>'Male'), Input::old('gender'), array('class' => 'form-control')) }}
        </div>
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
	<td>
 <div class="form-group">
                {{ Form::label('student_email_1', 'Student Email 1') }}
                {{ Form::text('student_email_1', Input::old('student_email_1'), array('class' => 'form-control')) }}
        </div>
	<tr>
	<td>
        <div class="form-group">
                {{ Form::label('flanguage', 'First Language') }}
                {{ Form::text('flanguage', Input::old('flanguage'), array('class' => 'form-control')) }}
        </div>
	<td>
         <div class="form-group">
                {{ Form::label('immigration', 'Immigration Status') }}
                {{ Form::select('immigration', array(' '=>'Select a Status', 'Landed'=>'Landed', 'Student Visa'=>'Student Visa', 'Citizen'=>'Citizen'), Input::old('immigration'), array('class' => 'form-control')) }}
        </div>
	<td>
        <div class="form-group">
                {{ Form::label('canada_doe', 'Date of Entry to Canada') }}
                {{ Form::text('canada_doe', Input::old('canada_doe'), array('class' => 'form-control')) }}
        </div>
	<tr>
	<td>
        <div class="form-group">
                {{ Form::label('lia_doe', 'Date of Entry to School') }}
                {{ Form::text('lia_doe', Input::old('lia_doe'), array('class' => 'form-control')) }}
        </div>
	<td>
         <div class="form-group">
                {{ Form::label('dob', 'Date of Birth') }}
                {{ Form::text('dob', Input::old('dob'), array('class' => 'form-control')) }}
        </div>
	<td>
         <div class="form-group">
                {{ Form::label('assessment_date', 'Assessment Date') }}
                {{ Form::text('assessment_date', Input::old('assessment_date'), array('class' => 'form-control')) }}
        </div>
	<tr>
	<td colspan='3'>
        <div class="form-group">
                {{ Form::label('education_note', 'Education Note') }}
                {{ Form::text('education_note', Input::old('education_note'), array('class' => 'form-control')) }}
        </div>
	<tr>
	<td>
  <div class="form-group">
                {{ Form::label('translator', 'Translator') }}
                {{ Form::select('translator', array(' '=>'Translator?', 'Y'=>'Yes', 'N'=>'No'), Input::old('translator'), array('class' => 'form-control')) }}
        </div>
	<td>
        <div class="form-group">
                {{ Form::label('career', 'Career') }}
                {{ Form::text('career', Input::old('career'), array('class' => 'form-control')) }}
        </div>
	<td>
         <div class="form-group">
                {{ Form::label('recommendations', 'Recommendations') }}
                {{ Form::text('recommendations', Input::old('recommendations'), array('class' => 'form-control')) }}
        </div>
	<tr>
	<td>
         <div class="form-group">
                {{ Form::label('aid', 'Agent') }}
                {{ Form::select('aid', $agent_options, Input::old('aid'), array('class' => 'form-control')) }}
        </div>
	<td>
 
                 <div class="form-group">
                        {{ Form::label('status', 'Status') }}
{{ Form::select('status', ['New'=>'New', 'Applied'=>'Applied', 'Visa Accepted'=>'Visa Accepted', 'Arrived'=>'Arrived', 'Attending Classes'=>'Attending Classes', 'Graduated'=>'Graduated','Away'=>'Away', 'Former Student'=>'Former Student'], Input::old('status'), array('class' => 'form-control')) }}
                </div>
	<tr>
	<td>
        
   {{ Form::submit('Submit Changes', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@stop
