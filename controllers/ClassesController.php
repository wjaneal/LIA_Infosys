<?php

class ClassesController extends \BaseController {

	/**
	 * Display a listing of classes
	 *
	 * @return Response
	 */
	public function index()
	{
		$classes = DB::table('classes')->join('users', 'users.id', '=', 'classes.tid')->join('courses', 'courses.id', '=', 'classes.code')->select('users.ulname', 'classes.period', 'courses.code', 'classes.id')->get();
#		var_dump($classes);
	return View::make('classes.index', compact('classes'));
	}

	/**
	 * Show the form for creating a new class
	 *
	 * @return Response
	 */
	public function create()
	{
		$teachers = User::where('type', "=", 'teacher')->get();
                $teacher_list = array(''=>'');
                foreach($teachers as $teacher){
	                $teacher_list[''.$teacher->id.''] = ''.$teacher->ulname.', '.$teacher->ufname.'';
                }
#		var_dump($teacher_list);
		$periods = array(''=>'');
		for($i = 1; $i < ((int) GlobalHelpers::showGlobal('periods')+1); $i++){
			$periods[$i] = $i; 
			}
		$codes = Course::all();
		$code_list = array(''=>'');
		foreach($codes as $code){
			$code_list[$code->id] = ''.$code->code.'';
			}
                return View::make('classes.create')->with('teachers', $teacher_list)->with('periods', $periods)->with('codes', $code_list);
	}

	/**
	 * Store a newly created class in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Class1::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Class1::create($data);

		return Redirect::route('classes.index');
	}

	/**
	 * Display the specified class.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$class = Class1::findOrFail($id);

		return View::make('classes.show', compact('class'));
	}

	/**
	 * Show the form for editing the specified class.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$class = Class1::find($id);

		return View::make('classes.edit', compact('class'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$class = Class1::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Class1::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$class->update($data);

		return Redirect::route('classes.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Class1::destroy($id);

		return Redirect::route('classes.index');
	}

}
