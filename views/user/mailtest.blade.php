@extends("layout_email")
@section("content")
<H2>Dear {{$firstname}}:</H2>
<p>{{$message_content}}</p>
@stop
