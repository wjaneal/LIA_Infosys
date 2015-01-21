<?php

class AttendanceController extends \BaseController {

	/**
	 * Display a listing of attendance records
	 *
	 * @return Response
	 */
	public function index()
	{
		$attendance = Attendance::all();

		return View::make('attendance.index', compact('attendance'));
	}

	/**
	 * Show the form for creating a new attendance record
	 *
	 * @return Response
	 */
	public function create($cid)
	{
		$class = $cid; //Change to Course Name + Teacher Name + Period
		$class_list = DB::table('enrolment')->where('cid', '=', $cid)->select('sid')->get();
		$students = array(''=>'');
		foreach($class_list as $student_id){
			$current_student = Student::find($student_id->sid);
			$students[$current_student->id] = ''.$current_student->slname.', '.$current_student->sfname.''; 
			}
		var_dump($class_list);
		return View::make('attendance.create')->with('class', $class)->with('students', $students);
	}

	/**
	 * Store a newly created attendance record in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Attendance::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		var_dump($data);
		foreach ($data['entry']  as $raw_record){
			$student_id = (int) substr($raw_record, 1);
			$entry = substr($raw_record,0,1);
			$record = array('entry'=>$entry, 'sid'=>$student_id, 'date'=>date('Y-m-d'), 'cid'=>$data['class'] );
			Attendance::create($record);
			}
		return Redirect::route('attendance.index');
	}

	/**
	 * Display the specified attendance record.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$attendance = Attendance::findOrFail($id);

		return View::make('attendance.show', compact('attendance'))->with($attendance,'attendance');
	}

	/**
	 * Show the form for editing the specified course.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$attendance = Attendance::find($id);

		return View::make('attendance.edit', compact('attendance'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$attenance = Attendance::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Attendance::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$attendance->update($data);

		return Redirect::route('attendance.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Attendance::destroy($id);

		return Redirect::route('attendance.index');
	}

}
