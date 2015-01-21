@extends('layout_international')
@section('content')
<H1>{{GlobalHelpers::showGlobal('schoolname')}}</H1>
<p>You have indicated an interest in receiving information about {{GlobalHelpers::showGlobal('schoolname')}}. Please confirm your interest by clicking the button below.

<a class="btn btn-success" href="{{ URL::to("http://www.icecraft.ca/infosys/public/agents/confirmation/1") }}">Confirm</a>
<a class="btn btn-warning" href="{{ URL::to("http://www.icecraft.ca/infosys/public/agents/declined/1") }}">No, Thanks</a>

@stop
