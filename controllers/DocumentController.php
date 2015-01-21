<?php

class DocumentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	$view=Auth::user()->type;
	#Agents are to see only the documents of their direct students
	#Accordingly, a join on the students table is done with the agent id as the link.
	#This will no doubt be improved with a better use of Laravel's database connections functionality
	$studentdocs = DB::table('documents')->select('sid')->groupBy('sid')->get();
	if(Auth::user()->type == 'agent'){
		$students = DB::table('students')->where('aid', "=", Auth::user()->uid)->orderBy('slname', 'asc')->orderBy('sfname', 'asc')->get();
		#Should modify to select only documents of students referred by the agent
		$documents = DB::table('documents')->join('students', function($join){
		$join->on('documents.sid', '=', 'students.id')->where('students.aid', '=', Auth::user()->uid);
			})
		->select('documents.id', 'documents.sid', 'documents.description', 'documents.directory', 'documents.filename', 'documents.type', 'documents.expiry')->get();
			}
	#Administrators see all students' documents.
	elseif(Auth::user()->type == 'admin'){
		$students = Student::all();
		$documents = DB::table('documents')
            ->join('students', 'documents.sid', '=', 'students.id')
            ->select('documents.id', 'documents.description', 'documents.directory', 'documents.filename', 'students.slname', 'students.sfname', 'documents.sid')
            ->get();
	}
		return View::make('documents.index')->with('documents', $documents)->with('students', $students)->with('studentdocs',$studentdocs)->with('view', $view);		
//
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($view='admin')
	{
	$view=Auth::user()->type;
	#This view allows agents to upload documents for referred students or administrators to upload documents for all students.
	if(Auth::user()->type == 'agent' or Auth::user()->type = 'admin'){
		if(Auth::user()->type == 'agent'){
			 	$students = DB::table('students')->select('id','slname', 'sfname')->where('aid',"=",Auth::user()->uid)->orderBy('slname', 'asc')->get();
			}
		elseif(Auth::user()->type == 'admin')
			{
			 	$students = DB::table('students')->select('id','slname', 'sfname')->orderBy('slname', 'asc')->get();
			}
		#Create a list of students by last name and first name; use in drop down menus
                $student_options = array();
                $student_options[""] = "";
                for($i = 0; $i < sizeof($students); $i++){
                        $object_extraction = $students[$i];
			$slname = $object_extraction->slname;
			$sfname = $object_extraction->sfname;
                        $name = $slname.', '.$sfname;
			$student_options[$object_extraction->id] = $name;
                        }
		
		return View::make('documents.create')->with('students',  $student_options)->with('view', $view);		
		}
	else
		{
		return View::make('user/login');
		}
//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$validator = Validator::make($data = Input::all(), Document::$rules);

                if ($validator->fails())
                {
                        return Redirect::back()->withErrors($validator)->withInput();
                }
		
		$file = Input::file('file');
        	$filename = $file->getClientOriginalName();
		$destinationPath = 'uploads';
		$data['filename'] = $filename;
		$data['directory'] = $destinationPath;
                Document::create($data);
		$upload_success = Input::file('file')->move($destinationPath, $filename);


                return Redirect::route('documents.index');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$documents = Document::findOrFail($id);
		$students = Student::all();
                return View::make('documents.show', ['documents'=>$documents, 'students'=>$students]);

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		 $documents = Document::find($id);
		$students = Student::all();
		$student_options = array();
                $student_options[""] = "";
                for($i = 0; $i < sizeof($students); $i++){
                        $object_extraction = $students[$i];
                        $slname = $object_extraction->slname;
                        $sfname = $object_extraction->sfname;
                        $name = $slname.', '.$sfname;
                        $student_options[$object_extraction->id] = $name;
                        }

                return View::make('documents.edit', ['documents'=>$documents, 'students'=>$students, 'student_options'=>$student_options]);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	 $documents = Document::findOrFail($id);

                $validator = Validator::make($data = Input::all(), Document::$rules);

                if ($validator->fails())
                {
                        return Redirect::back()->withErrors($validator)->withInput();
                }

                $documents->update($data);

                return Redirect::route('documents.index');
	
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Document::destroy($id);

                return Redirect::route('documents.index');
	
	//
	}


}
