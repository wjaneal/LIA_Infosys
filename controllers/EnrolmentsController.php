<?php

class EnrolmentsController extends \BaseController {

	/**
	 * Display a listing of courses
	 *
	 * @return Response
	 */
	public function index()
	{
		$enrolments = Enrolment::all();

		return View::make('enrolments.index', compact('enrolments'));
	}

	/**
	 * Show the form for creating a new course
	 *
	 * @return Response
	 */
	public function create()
		{
		$students = Student::all();
		$classes = DB::table('classes')->join('users', 'users.id', '=', 'classes.tid')->join('courses', 'courses.id', '=', 'classes.code')->select('classes.id', 'users.ulname', 'classes.period', 'courses.code')->get();

		$student_list = array(''=>'');
		$classes_list = array(''=>'');
		foreach($students as $student){
			$student_list[$student->id]= ''.$student->slname.', '.$student->sfname.'';
			}
		foreach($classes as $class){
			$classes_list[$class->id] = ''.$class->code.', '.$class->ulname.', Per. '.$class->period.'';
			}
	
		return View::make('enrolments.create')->with('students', $student_list)->with('classes', $classes_list);
	}

	/**
	 * Store a newly created course in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Enrolment::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$data['date'] = date('Y-m-d');
		Enrolment::create($data);

		return Redirect::route('enrolments.index');
	}

	/**
	 * Display the specified course.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$course = Course::findOrFail($id);

		return View::make('courses.show', compact('course'));
	}

	/**
	 * Show the form for editing the specified course.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$course = Course::find($id);

		return View::make('courses.edit', compact('course'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$course = Course::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Course::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$course->update($data);

		return Redirect::route('courses.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Course::destroy($id);

		return Redirect::route('courses.index');
	}

}
