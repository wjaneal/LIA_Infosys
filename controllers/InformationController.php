<?php

class InformationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	$view = Auth::user()->type;
	return View::make('information.index')->with('view', $view);		
	}
}
