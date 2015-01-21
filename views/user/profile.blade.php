@extends(Auth::user()->type == 'staff' ? "layout_staff":"layout_international")
@section("content")
    <h2>Hello, {{ Auth::user()->ufname }}!</h2>
    <p>Welcome to the {{GlobalHelpers::showGlobal('schoolname')}} Information System.</p>
@stop
