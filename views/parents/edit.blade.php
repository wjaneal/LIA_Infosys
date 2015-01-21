@extends($view==="staff" ? "layout_staff":"layout_international")
@section("content")
<h1>Edit {{ $parents->fname,' ', $parents->lname }}</h1>
<h2>{{Carbon::now()}}</h2>
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}
{{ Form::model($parents, array('route' => array('parents.update', $parents->id), 'method' => 'PUT')) }}

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
                {{ Form::label('dob', 'Date of Birth') }}
                {{ Form::text('dob', Input::old('dob'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
                {{ Form::label('parent', 'Father or Mother') }}
                {{ Form::select('parent', array(' '=> 'Select a Parent', 'Father'=> 'Father', 'Mother'=>'Mother'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
                {{ Form::label('address', 'Address') }}
                {{ Form::text('address', Input::old('address'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
                {{ Form::label('country', 'Country') }}
                {{ Form::text('country', Input::old('country'), array('class' => 'form-control')) }}
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
                {{ Form::label('phone', 'Phone') }}
                {{ Form::text('phone', Input::old('phone'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
                {{ Form::label('fax', 'Second Phone') }}
                {{ Form::text('fax', Input::old('fax'), array('class' => 'form-control')) }}
        </div>



	{{ Form::submit('Submit Changes', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop
