<?php

class StudentstepsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /studentsteps
	 *
	 * @return Response
	 */
	public function index()
	{
	$student_steps = Studentsteps::all();
	$students = Student::all();
	$teachers = Teacher::all();
	$steps = Step::all();
	return View::make('studentsteps.index')->with('student_steps', $student_steps)->with('students',$students)->with('teachers', $teachers)->with('steps',$steps);
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /studentsteps/create
	 /*
	 * @return Response
	 */
	public function create()
	{

	$steps = DB::table('steps')->select('id','category','element','subelement','step', 'text')->get();
	$category_options = array();	
	$category_options[""] = "";
	for($i=0; $i < sizeof($steps); $i++){
		$object_extraction = $steps[$i];
		$step_array = array();
		$step_array['category'] = $object_extraction->category;
		$step_array['element'] = $object_extraction->element;
		$step_array['subelement'] =$object_extraction->subelement;
		$step_array['step'] = $object_extraction->step;
		$step_array['text'] = $object_extraction->text;
		$category_options[''.$object_extraction->id.''] = $step_array;
		}

	 $students = DB::table('students')->select('id','slname', 'sfname')->orderBy('slname', 'asc')->get();
                $student_options = array();
                $student_options[""] = "";
                for($i = 0; $i < sizeof($students); $i++){
                        $object_extraction = $students[$i];
                        $slname = $object_extraction->slname;
                        $sfname = $object_extraction->sfname;
                        $name = $slname.', '.$sfname;
                        $student_options[$object_extraction->id] = $name;
                        }
	$steps = DB::table('steps')->select('id','category','element','subelement','step','text')->get();
	$categories = DB::table('steps')->select('category')->groupBy('category')->lists('category');
	$element_lists = array();
	$subelement_lists = array(); 
	$text_lists = array(); 
	foreach($categories as $category){
		$element_list = DB::table('steps')->select('element')->where('category',"=",$category)->groupBy('element')->lists('element');
		$element_lists[''.$category.''] = $element_list;
		foreach($element_list as $element){
			$subelement_list = DB::table('steps')->select('subelement')->where('category',"=",$category)->where('element',"=",$element)->groupBy('subelement')->lists('subelement'); 
			$subelement_lists[''.$category.' '.$element.''] = $subelement_list;
			foreach($subelement_list as $subelement){
				for($i = 1; $i<7; $i++){
					$text_list = DB::table('steps')->select('step', 'text')->where('category', "=", $category)->where('element', "=", $element)->where('subelement', "=", $subelement)->where('step', "=", $i)->lists('step', 'text'); 
					$text_lists[''.$category.' '.$element.' '.$subelement.' '.$i.''] = $text_list;
					}
				}
			}
		}
	  
	
	
	return View::make('studentsteps.create')->with('students',$student_options)->with('steps',$steps)->with('categories', $categories)->with('element_lists', $element_lists)->with('subelement_lists',$subelement_lists)->with('text_lists', $text_lists);
		//
		//
	}

	public function selectelement(){
	 	$students = DB::table('students')->select('id','slname', 'sfname')->orderBy('slname', 'asc')->get();
                $student_options = array();
                $student_options[""] = "";
                for($i = 0; $i < sizeof($students); $i++){
                        $object_extraction = $students[$i];
                        $slname = $object_extraction->slname;
                        $sfname = $object_extraction->sfname;
                        $name = $slname.', '.$sfname;
                        $student_options[$object_extraction->id] = $name;
                        }
         
			$choices = DB::table('steps')->lists('category', 'element');
		$choices_array = array();
		foreach($choices as $key=>$value){
			$choices_array[''.$value.'_'.$key.''] = $value.' '.$key;
			}
		return View::make('studentsteps.selectelement')->with('choices', $choices_array)->with('students', $student_options); 
	}


	public function assesselement(){
		$data = Input::get('choices');
		$student_data = Input::get('student');
		$student_data = DB::table('students')->where('id', '=', $student_data)->lists('slname','sfname');
		#Should only be one row; 
		foreach($student_data as $key=>$value){
		$student = $value.', '.$key;
		}
		$data_extract = explode('_', $data);
		$category = $data_extract[0];
		$element = $data_extract[1];
		$text_lists = array();
                        $subelement_list = DB::table('steps')->select('subelement')->where('category',"=",$category)->where('element',"=",$element)->groupBy('subelement')->lists('subelement');
                        $subelement_lists[''.$category.' '.$element.''] = $subelement_list;
                        foreach($subelement_list as $subelement){
                                for($i = 1; $i<7; $i++){
                                        $text_list = DB::table('steps')->select('step', 'text')->where('category', "=", $category)->where('element', "=", $element)->where('subelement', "=", $subelement)->where('step', "=", $i)->lists('step', 'text');
                                        $text_lists[''.$category.' '.$element.' '.$subelement.' '.$i.''] = $text_list;
                                        }
                                }
		$steps = DB::table('steps')->select('id','category','element','subelement','step','text')->where('category', "=", $category)->where('element', '=', $element)->get();
		return View::make('studentsteps.assesselement')->with('text_lists', $text_lists)->with('data',$data)->with('category', $category)->with('element', $element)->with('subelement_lists', $subelement_lists)->with('student',$student);
	}
	
	/**
	 * Store a newly created resource in storage.
	 * POST /studentsteps
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$data = Input::all();
		$record_array = array();
		foreach($data as $step_entry=>$value){
			$record = explode("_",$step_entry);
			if(sizeof($record)==4){
				array_push($record_array, $record);
				$category = $record[0];
				$element = $record[1];	
				$subelement= $record[2];
				$step = $record[3];
				$step_id = DB::table('steps')->select('id')->where('category',"=",$category)->where('element', "=", $element)->where('subelement',"=",$subelement)->where('step',"=",$step)->lists('id');
				$student_id = 1;
				$class_id=1;
				$teacher_id=1;
				$step_id = 1;
				$student_step = new Studentsteps;
				$student_step->student_id = $student_id;
				$student_step->step_id = $step_id;
				$student_step->teacher_id = $teacher_id;
				$student_step->class_id = $class_id;
				$student_step->save();	
			}
			
		}
		
		return View::make('studentsteps.store')->with('data', $data)->with('record_array', $record_array);
	}

	/**
	 * Display the specified resource.
	 * GET /studentsteps/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /studentsteps/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /studentsteps/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /studentsteps/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
