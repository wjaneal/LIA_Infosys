<?php

class AssessorsController extends \BaseController {

	/**
	 * Display a listing of assessors
	 *
	 * @return Response
	 */
	public function index()
	{
		$assessors = Assessor::all();

		return View::make('assessors.index', compact('assessors'));
	}

	/**
	 * Show the form for creating a new assessor
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('assessors.create');
	}

	/**
	 * Store a newly created assessor in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Assessor::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Assessor::create($data);

		return Redirect::route('assessors.index');
	}

	/**
	 * Display the specified assessor.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$assessor = Assessor::findOrFail($id);

		return View::make('assessors.show', compact('assessor'));
	}

	/**
	 * Show the form for editing the specified assessor.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$assessor = Assessor::find($id);

		return View::make('assessors.edit', compact('assessor'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$assessor = Assessor::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Assessor::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$assessor->update($data);

		return Redirect::route('assessors.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Assessor::destroy($id);

		return Redirect::route('assessors.index');
	}

}