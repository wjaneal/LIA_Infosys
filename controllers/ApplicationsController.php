<?php

class ApplicationsController extends \BaseController {

	/**
	 * Display a listing of applications
	 *
	 * @return Response
	 */
	public function index()
	{
		$applications = Application::all();

		return View::make('applications.index', compact('applications'));
	}

	/**
	 * Show the form for creating a new application
	 *
	 * @return Response
	 */
	public function create(){ 
		$applications = Application::all();
		$countries = DB::table('countrieslists')->select('country_name')->orderBy('country_name', 'asc')->groupBy('country_name')->get();
		$country_options = array();
		$country_options[""] = "";
		for($i = 0; $i < sizeof($countries); $i++){
			$object_extraction = $countries[$i];
			$country_options[$object_extraction->country_name] = $object_extraction->country_name; 
			}	
		return View::make('applications.create')->with('applications',$applications)->with('country_options', $country_options);
	}

	/**
	 * Store a newly created application in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Application::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Application::create($data);

		return Redirect::route('applications.index');
	}

	/**
	 * Display the specified application.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$application = Application::findOrFail($id);

		return View::make('applications.show', compact('application'));
	}

	/**
	 * Show the form for editing the specified application.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$application = Application::find($id);

		return View::make('applications.edit', compact('application'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$application = Application::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Application::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$application->update($data);

		return Redirect::route('applications.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Application::destroy($id);

		return Redirect::route('applications.index');
	}

}
