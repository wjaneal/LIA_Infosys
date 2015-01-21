@extends("layout")
@section("content")
<h1>Edit {{ $students->sfname,' ', $students->slname }}</h1>
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}
{{ Form::model($students, array('route' => array('students.update', $students->id), 'method' => 'PUT')) }}
        <div class="form-group">
                {{ Form::label('slname', 'Family Name') }}
                {{ Form::text('slname', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
                {{ Form::label('sfname', 'Name') }}
                {{ Form::text('sfname', null, array('class' => 'form-control')) }}
        </div>
   <div class="form-group">
                {{ Form::label('grade', 'Grade') }}
                {{ Form::select('Grade', array(' ' => 'Select a Grade', '9' => 'Grade 9 ', '10' => 'Grade 10', '11' => 'Grade 11', '12'=> 'Grade 12'), null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
                {{ Form::label('address', 'Address') }}
                {{ Form::text('address', Input::old('address'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
                {{ Form::label('city', 'City') }}
                {{ Form::text('city', Input::old('city'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
                {{ Form::label('postalcode', 'Postal Code') }}
                {{ Form::text('postalcode', Input::old('postalcode'), array('class' => 'form-control')) }}
        </div>
 <div class="form-group">
                {{ Form::label('country', 'Country') }}
                {{ Form::text('country', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
                {{ Form::label('phone', 'Phone') }}
                {{ Form::text('phone', Input::old('phone'), array('class' => 'form-control')) }}
        </div>
         <div class="form-group">
                {{ Form::label('gender', 'Gender') }}
                {{ Form::select('gender', array(' '=> 'Select a Gender', 'F'=> 'Female', 'M'=>'Male'), array('class' => 'form-control')) }}
        </div>
 <div class="form-group">
                {{ Form::label('parent1', 'Parent 1') }}
                {{ Form::select('parent1', $parents, Input::old('parent1'), array('class' => 'form-control')) }}
        </div>
         <div class="form-group">
                {{ Form::label('parent2', 'Parent 2') }}
                {{ Form::select('parent2', $parents, Input::old('parent2'), array('class' => 'form-control')) }}
        </div>

 <div class="form-group">
                {{ Form::label('account_name', 'Account Name') }}
                {{ Form::text('account_name', Input::old('account_name'), array('class' => 'form-control')) }}
        </div>
 <div class="form-group">
                {{ Form::label('student_email_1', 'Student Email 1') }}
                {{ Form::text('student_email_1', Input::old('student_email_1'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
                {{ Form::label('flanguage', 'First Language') }}
                {{ Form::text('flanguage', Input::old('flanguage'), array('class' => 'form-control')) }}
        </div>
         <div class="form-group">
                {{ Form::label('immigration', 'Immigration Status') }}
                {{ Form::select('immigration', array(' '=>'Select a Status', 'Landed'=>'Landed', 'Student Visa'=>'Student Visa', 'Citizen'=>'Citizen'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
                {{ Form::label('canada_doe', 'Date of Entry to Canada') }}
                {{ Form::text('canada_doe', Input::old('canada_doe'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
                {{ Form::label('lia_doe', 'Date of Entry to School') }}
                {{ Form::text('lia_doe', Input::old('lia_doe'), array('class' => 'form-control')) }}
        </div>
         <div class="form-group">
                {{ Form::label('dob', 'Date of Birth') }}
                {{ Form::text('dob', Input::old('dob'), array('class' => 'form-control')) }}
        </div>
         <div class="form-group">
                {{ Form::label('assessment_date', 'Assessment Date') }}
                {{ Form::text('assessment_date', Input::old('assessment_date'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
                {{ Form::label('education_note', 'Education Note') }}
                {{ Form::text('education_note', Input::old('education_note'), array('class' => 'form-control')) }}
        </div>
  <div class="form-group">
                {{ Form::label('translator', 'Translator') }}
                {{ Form::select('translator', array(' '=>'Translator?', 'Y'=>'Yes', 'N'=>'No'), Input::old('translator'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
                {{ Form::label('career', 'Career') }}
                {{ Form::text('career', Input::old('career'), array('class' => 'form-control')) }}
        </div>
         <div class="form-group">
                {{ Form::label('recommendations', 'Recomendations') }}
                {{ Form::text('recomendations', Input::old('recomendations'), array('class' => 'form-control')) }}
        </div>

   {{ Form::submit('Submit Changes', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@stop
