<?php

class CountriesListsController extends \BaseController {

	/**
	 * Display a listing of countrieslists
	 *
	 * @return Response
	 */
	public function index()
	{
		$countrieslists = Countrieslists::all();


		return View::make('countrieslists.index', compact('countrieslists'));
	}

	/**
	 * Show the form for creating a new countrieslist
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('countrieslists.create');
	}

	/**
	 * Store a newly created countrieslist in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Countrieslist::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Countrieslist::create($data);

		return Redirect::route('countrieslists.index');
	}

	/**
	 * Display the specified countrieslist.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$countrieslist = Countrieslist::findOrFail($id);

		return View::make('countrieslists.show', compact('countrieslist'));
	}

	/**
	 * Show the form for editing the specified countrieslist.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$countrieslist = Countrieslist::find($id);

		return View::make('countrieslists.edit', compact('countrieslist'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$countrieslist = Countrieslist::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Countrieslist::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$countrieslist->update($data);

		return Redirect::route('countrieslists.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Countrieslist::destroy($id);

		return Redirect::route('countrieslists.index');
	}

}
