@extends("layout_international")
@section("content")
<H2>Dear {{$firstname}}:</H2>
<p>{{$message_content}}</p>
<img src = {{asset("$image_path")}}></img>
@stop
