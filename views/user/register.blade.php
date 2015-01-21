@extends("layout_international")
@section("content")
<H1>Register - {{GlobalHelpers::showGlobal('schoolname')}} Information System</H1>
    {{ Form::open([
        "route"        => "user/newuser",
        "autocomplete" => "off"
    ]) }}
	<br>
        {{ Form::label("ulname", "Surname") }}
        {{ Form::text("ulname", Input::old("ulname"))}}
	<br>
        {{ Form::label("ufname", "First Name") }}
        {{ Form::text("ufname", Input::old("ufname"))}} 
        <br>
	{{ Form::label("username", "Username") }}
        {{ Form::text("username", Input::old("username"), [
            "placeholder" => "john.smith"
        ]) }}
	<br>
        {{ Form::label("password", "Password") }}
        {{ Form::password("password", [
            "placeholder" => "●●●●●●●●●●"
        ]) }}
	<br>
        {{ Form::label("type", "User Type") }}
        {{ Form::select("type", array(''=>'', 'admin'=>'Administrator', 'agent'=>'Agent', 'teacher'=>'Teacher', 'staff'=>'Staff'), array('type'=>'form-control'))}}
        {{ Form::submit("Submit") }}
    {{ Form::close() }}
@stop
@section("footer")
    @parent
@stop
