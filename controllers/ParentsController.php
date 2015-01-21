<?php

class ParentsController extends \BaseController {
	/**
	 * Display a listing of parents
	 *
	 * @return Response
	 */
	public function index()
	{
		$view = Auth::user()->type;
		#Show all the parents
		$parents = DB::table('parents')->select('lname', 'fname', 'id')->orderBy('lname', 'ASC')->orderBy('fname', 'ASC')->get();
		$country_options = DB::table('countrieslists')->select('country_name')->groupBy('country_name')->get();
		$students = DB::table('students')->select('slname', 'sfname', 'parent1', 'parent2')->where('parent1', "!=", "")->get();
		return View::make('parents.index')->with('parents', $parents)->with('countrieslists',$country_options)->with('students', $students)->with('view' , $view);
	}

	/**
	 * Show the form for creating a new parent
	 *
	 * @return Response
	 */
	public function create()
		#Create Parents
		{
		$view = Auth::user()->type;
		$parents = Parents::all();
		$countries = DB::table('countrieslists')->select('country_name')->orderBy('country_name', 'asc')->groupBy('country_name')->get();
		$country_options = array();
		$country_options[""] = "";
		for($i = 0; $i < sizeof($countries); $i++){
			$object_extraction = $countries[$i];
			$country_options[$object_extraction->country_name] = $object_extraction->country_name; 
			}	
		return View::make('parents.create')->with('parents',$parents)->with('country_options', $country_options)->with('view', $view);
	}

	/**
	 * Store a newly created parent in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		#Store parents with validation
		$validator = Validator::make($data = Input::all(), Parents::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$data['dob'] =date("Y-m-d", strtotime($data['dob']));
		$new_parent = New Parents;
		$new_parent->lname = $data['lname'];
		$new_parent->fname= $data['fname'];
		$new_parent->country = $data['country'];
		$new_parent->city = $data['city'];
		$new_parent->address1 = $data['address1'];
		$new_parent->state = $data['state'];
		$new_parent->postalcode = $data['postalcode'];
		$new_parent->phone = $data['phone'];
		$new_parent->fax = $data['fax'];
		$new_parent->email = $data['email'];
		$new_parent->dob = $data['dob'];
		$new_parent->save();
		return Redirect::route('parents.index');
	}

	/**
	 * Display the specified parent.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$view = Auth::user()->type;
		#Not sure why this was commented out....
		$parents = Parents::findOrFail($id);
		$students = DB::table('students')->select('slname', 'sfname', 'parent1', 'parent2')->where('parent1', "!=", "")->get();

		return View::make('parents.show', ['parents'=>$parents, 'students'=>$students])->with('view', $view);
	}

	/**
	 * Show the form for editing the specified parent.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$view = Auth::user()->type;
		#Edit parents
		$parents = Parents::find($id);

		return View::make('parents.edit', ['parents'=>$parents])->with('view', $view);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		#Update parent records
		$parents = Parents::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Parents::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$parents->update($data);

		return Redirect::route('parents.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	#Delete a parent
	{
		Parents::destroy($id);

		return Redirect::route('parents.index');
	}

}
