@extends("layout_blank")
@section("content")
    {{ Form::open([
        "route"        => "user/login",
        "autocomplete" => "off"
    ]) }}
        {{ Form::label("username", "Username") }}
        {{ Form::text("username", Input::old("username"), [
            "placeholder" => "john.smith"
        ]) }}
        {{ Form::label("password", "Password") }}
        {{ Form::password("password", [
            "placeholder" => "●●●●●●●●●●"
        ]) }}
	@if ($error = $errors->first("password"))
            <div class="error">
                {{ $error }}
            </div>
        @endif
	{{$error}}
        {{ Form::submit("Login") }}
    {{ Form::close() }}
@stop
@section("footer")
    @parent
@stop
