<?php

class RegistrationsController extends \BaseController {

	/**
	 * Display a listing of registrations
	 *
	 * @return Response
	 */
	public function index()
	{
		$registrations = Registration::all();

		return View::make('registrations.index', compact('registrations'));
	}

	/**
	 * Show the form for creating a new registration
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registrations.create');
	}

	/**
	 * Store a newly created registration in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Registration::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Registration::create($data);

		return Redirect::route('registrations.index');
	}

	/**
	 * Display the specified registration.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$registration = Registration::findOrFail($id);

		return View::make('registrations.show', compact('registration'));
	}

	/**
	 * Show the form for editing the specified registration.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$registration = Registration::find($id);

		return View::make('registrations.edit', compact('registration'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$registration = Registration::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Registration::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$registration->update($data);

		return Redirect::route('registrations.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Registration::destroy($id);

		return Redirect::route('registrations.index');
	}

}