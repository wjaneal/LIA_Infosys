<!-- app/views/applications/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>New Applicationt</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('students') }}">Students</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('students') }}">View All Students</a></li>
		<li><a href="{{ URL::to('students/create') }}">Add a New Student</a>
	</ul>
</nav>

<h1>New Application</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'applications')) }}

	<div class="form-group">
		{{ Form::label('slname', 'Family Name') }}
		{{ Form::text('slname', Input::old('slname'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('sfname', 'Name') }}
		{{ Form::text('sfname', Input::old('sfname'), array('class' => 'form-control')) }}
	</div>

	 <div class="form-group">
                {{ Form::label('country', 'Country') }}
                {{ Form::select('country', $country_options, Input::old('country'), array('class' => 'form-control')) }}
        </div>

	<div class="form-group">
                {{ Form::label('gender', 'Gender') }}
                {{ Form::select('gender', array(' '=> 'Select a Gender', 'F'=> 'Female', 'M'=>'Male'), array('class' => 'form-control')) }}
        </div>
	<div class="form-group">
		{{ Form::label('street', 'Street') }}
		{{ Form::text('street', Input::old('street'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('apartment', 'Apartment') }}
		{{ Form::text('apartment', Input::old('apartment'), array('class' => 'form-control')) }}
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
		{{ Form::label('postalcode', 'Postal Code') }}
		{{ Form::text('postalcode', Input::old('postalcode'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('email', 'Email') }}
		{{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('student_email_1', 'Email') }}
		{{ Form::text('student_email_1', Input::old('student_email_1'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('englishlevel', 'English Level') }}
		{{ Form::text('englishlevel', Input::old('englishlevel'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('fatherfname', 'First Name') }}
		{{ Form::text('fatherfname', Input::old('fatherfname'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('fatherlname', 'Last Name') }}
		{{ Form::text('fatherlname', Input::old('fatherlname'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('fatherdob', 'Date of Birth') }}
		{{ Form::text('fatherdob', Input::old('fatherdob'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('fatheraddress', 'Address') }}
		{{ Form::text('fatheraddress', Input::old('fatehraddress'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('fathercountry', 'Country') }}
		{{ Form::text('fathercountry', Input::old('fathercountry'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('fatherstate', 'State') }}
		{{ Form::text('fatherstate', Input::old('fatehrstate'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('fatherpostalcode', 'Postal Code') }}
		{{ Form::text('fatherpostalcode', Input::old('fatehrpostalcode'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('fatherphone', 'Telephone') }}
		{{ Form::text('fatherphone', Input::old('fatherphone'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('fatherfax', 'Fax') }}
		{{ Form::text('fatherfax', Input::old('fatherfax'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('fatheremail', 'Email') }}
		{{ Form::text('fatheremail', Input::old('fatheremail'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('motherfname', 'First Name') }}
		{{ Form::text('motherfname', Input::old('motherfname'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('motherlname', 'Last Name') }}
		{{ Form::text('motherlname', Input::old('motherlname'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('motherdob', 'Date of Birth') }}
		{{ Form::text('motherdob', Input::old('motherdob'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('motheraddress', 'Address') }}
		{{ Form::text('motheraddress', Input::old('motehraddress'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('mothercountry', 'Country') }}
		{{ Form::text('mothercountry', Input::old('mothercountry'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('motherstate', 'State') }}
		{{ Form::text('motherstate', Input::old('motherstate'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('motherpostalcode', 'Postal Code') }}
		{{ Form::text('motherpostalcode', Input::old('motherpostalcode'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('motherphone', 'Telephone') }}
		{{ Form::text('motherphone', Input::old('motherphone'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('motherfax', 'Fax') }}
		{{ Form::text('motherfax', Input::old('motherfax'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('motheremail', 'Email') }}
		{{ Form::text('motheremail', Input::old('motheremail'), array('class' => 'form-control')) }}
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
                {{ Form::label('dob', 'Date of Birth') }}
                {{ Form::text('dob', Input::old('dob'), array('class' => 'form-control')) }}
        </div>
	 <div class="form-group">
	<div class="form-group">
                {{ Form::label('applicationfee', 'Application Fee') }}
                {{ Form::select('applicationfee', array(' '=>'Select a Status', 'Pending'=>'0', 'Received'=>'1'), array('class' => 'form-control')) }}
        </div>

	{{ Form::submit('Submit Application', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
