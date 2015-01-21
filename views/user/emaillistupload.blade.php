@extends("layout_international")
@section("content")
    <h2>Hello, Lina</h2>
    <p>Welcome to the {{GlobalHelpers::showGlobal('schoolname')}} Mass Email System.</p>
{{ Form::open(array('url' => 'emailaction', 'files' => true)) }}
<H3>Please enter a subject:</H3>
{{Form::text('subject')}}
<H3>Please enter the message text:</H3> 
{{Form::textarea('message_content')}}
<H3>Please enter a 'from' address</H3>
{{Form::select('from', array(''=>'Select a Sender', 'admissions@lia-edu.ca'=>'Admissions', 'lrivas@lia-edu.ca'=>'Lina Rivas', 'wneal@lia-edu.ca'=>'William Neal'), array('class'=>'form-control'))}}
<H3>Please select a .csv file of email addresses. (One column for full name and one column for email addresses)</H3>
{{ Form::file('file')}}
<H3>Please select an image file to be sent with your email:</H3>
{{ Form::file('image')}}
<p>
<p>
<p>
{{Form::submit('Send Email')}}
{{Form::close()}}
@stop
