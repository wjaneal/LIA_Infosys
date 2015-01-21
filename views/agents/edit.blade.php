@extends($view==='staff'? "layout_staff":"layout_international")
@section("content")
<h1>Edit {{ $agents->sfname,' ', $agents->slname }}</h1>
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($agents, array('route' => array('agents.update', $agents->id), 'method' => 'PUT')) }}
  <div class="form-group">
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
                {{ Form::label('alname', 'Family Name') }}
                {{ Form::text('alname', Input::old('alname'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
                {{ Form::label('afname', 'Name') }}
                {{ Form::text('afname', Input::old('afname'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
                {{ Form::label('jobtitle', 'Job Title') }}
                {{ Form::text('jobtitle', Input::old('jobtitle'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
                {{ Form::label('company', 'Company / Agency / Organization') }}
                {{ Form::text('company', Input::old('company'), array('class' => 'form-control')) }}
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
                {{ Form::label('jobtitle', 'Job Title') }}
                {{ Form::text('jobtitle', Input::old('jobtitle'), array('class' => 'form-control')) }}
        </div>
         <div class="form-group">
                {{ Form::label('cphone', 'Cell Phone') }}
                {{ Form::text('cphone', Input::old('cphone'), array('class' => 'form-control')) }}
        </div>
         <div class="form-group">
                {{ Form::label('bphone', 'Business Phone') }}
                {{ Form::text('bphone', Input::old('bphone'), array('class' => 'form-control')) }}
        </div>
         <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
        </div>
         <div class="form-group">
                {{ Form::label('website', 'Website') }}
                {{ Form::text('website', Input::old('website'), array('class' => 'form-control')) }}
        </div>
         <div class="form-group">
                {{ Form::label('paymentpreference', 'Payment Preference') }}
                {{ Form::text('paymentpreference', Input::old('paymentpreference'), array('class' => 'form-control')) }}
        </div>
         <div class="form-group">
                {{ Form::label('payeename', 'Payee Name') }}
                {{ Form::text('payeename', Input::old('payeename'), array('class' => 'form-control')) }}
        </div>
         <div class="form-group">
                {{ Form::label('bankinformation', 'Bank Information') }}
                {{ Form::text('bankinformation', Input::old('bankinformation'), array('class' => 'form-control')) }}
        </div>

	{{ Form::submit('Submit Changes', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop
