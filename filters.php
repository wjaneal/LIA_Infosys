<?php

Route::filter("auth", function()
{
    if (Auth::guest())
    {
        return Redirect::route("user/login");
    }
});

Route::filter("guest", function()
{
    if (Auth::check())
    {
        return Redirect::route("user/profile");
    }
});

Route::filter("csrf", function()
{
    if (Session::token() != Input::get("_token"))
    {
        throw new Illuminate\Session\TokenMismatchException;
    }
});
/*
#A filter to remove all but teacherss and admins from particular routes:
Route::filter("agent", function()
{
	if(Auth::user()->type!=='admin' && Auth::user()->type!=='teacher')
	{
		return Redirect::route("user/profile");
	}
});


#A filter to remove all but agents and admins from particular routes:
Route::filter("agent", function()
{
	if(Auth::user()->type!=='admin' && Auth::user()->type!=='agent')
	{
		return Redirect::route("user/profile");
	}
});


#A filter to remove all but staff and admins from particular routes:
Route::filter("staff", function()
{
	if(Auth::user()->type!=='admin' && Auth::user()->type!=='staff')
	{
		return Redirect::route("user/profile");
	}
});

#A filter to remove all but admins from particular routes:
Route::filter("admin", function()
{
	if(Auth::user()->type!=='admin')
	{
		return Redirect::route("user/profile");
	}
});

*/

