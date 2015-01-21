@extends('layout')
@section('content')
<H1>Assess STEP Progress</H1>
<h2>{{$student}}</h2>
<H3>{{$category}}, {{$element}}</H3>

{{Form::open(['url' => 'studentsteps'])}}
<table>
 @foreach($subelement_lists as $key2=>$subelements)
                                        @if($key2 === $category.' '.$element)
                                                @foreach($subelements as $subelement)
                                                        <tr><td>{{$subelement}}
                                                        @for($i=1; $i<7; $i++)
                                                                <tr><td>
                                                                @foreach($text_lists as $key3=>$text_list)
                                                                        @if($key3 === $category.' '.$element.' '.$subelement.' '.$i)
                                                                                @foreach($text_list as $text=>$step)
                                                                                        <tr><td>
                                                                                        {{Form::checkbox($key3)}}
                                                                                        {{$step}}
                                                                                        {{$text}}
                                                                                @endforeach
                                                                                <p>--------------------------------------------------------------------------------------------------------------------------------------------
                                                                        @endif
                                                                @endforeach
                                                        @endfor
                                                @endforeach
                                        @endif
                                @endforeach
</table>
{{Form::submit('Submit Assessment')}}
{{Form::close()}}
@stop
