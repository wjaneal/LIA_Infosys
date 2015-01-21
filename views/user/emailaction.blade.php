@extends("layout_international")
@section("content")
    <h2>Hello, Lina</h2>
    <p>Please Click the Button to Send the Email.</p>
{{ Form::open(array('url' => 'user/emailsend')) }}
{{Form::submit('Send Email')}}
{{Form::close()}}
@stop
