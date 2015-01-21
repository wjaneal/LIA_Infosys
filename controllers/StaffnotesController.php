<?php
class StaffnotesController extends \BaseController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	$view=Auth::user()->type;
	$notes = DB::table('staffnotes')->join('users','users.id','=','staffnotes.staffuid')->select('staffnotes.date','staffnotes.note', 'staffnotes.referencetype', 'staffnotes.referenceid', 'users.id','users.ulname','users.ufname')->get(); 
	$agents = Agent::all();
	$students = Student::all();
	$noteslist = array();
	foreach($notes as $note){
		$content = DB::table($note->referencetype)->where('id', '=', $note->referenceid)->get();
		$content['referencetype'] = $note->referencetype;
		$content['note']=$note;
		$content['agent'] = ''; 
		$content['agent']['alname'] = '';
		$content['agent']['afname'] = '';
		$content['student'] = '';
		$content['student']['sfname']='';
		$content['student']['slname']='';
		if ($content['referencetype']=='agents'){
			foreach ($agents as $agent){
				if ($agent['id'] == $note->referenceid){
					$content['agent'] = $agent;
					}
				}
			}
		elseif ($content['referencetype']=='students'){
			foreach ($students as $student){
				if($student['id'] == $note->referenceid){
					$content['student'] = $student;
					}
				}
			}
		array_push($noteslist, $content);
		}
/*foreach($noteslist as $note){
	echo "Note:<br><br>";
	foreach($note as $key=>$value){
	echo "NoteItem:<br><br>";
		echo"Key<br>";
		var_dump($key);
		echo"Value<br>";
		var_dump($value);
		}
	}*/
#var_dump($noteslist);
#var_dump($view);
	return View::make('staffnotes.index')->with('noteslist', $noteslist)->with('notes', $notes)->with('view',$view); 
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	$view=Auth::user()->type;
	$students = DB::table('students')->select('id', 'slname','sfname')->orderBy('slname', 'ASC')->orderBy('sfname', 'ASC')->get();
	$teachers = DB::table('teachers')->select('id', 'tlname','tfname')->orderBy('tlname', 'ASC')->orderBy('tfname', 'ASC')->get();
	$agents = DB::table('agents')->select('id', 'alname','afname')->orderBy('alname', 'ASC')->orderBy('afname', 'ASC')->get();
	#Assign 'A' to default agent list value and 'S' for default student value
	$agent_list = array('A'=>'Select an Agent');
	foreach($agents as $agent){
		$agent_list[$agent->id] = ''.$agent->alname.', '.$agent->afname.'';
		}
	$student_list = array('S'=>'Select a Student');
	foreach($students as $student){
		$student_list[$student->id] = ''.$student->slname.', '.$student->sfname.'';
		}
	#Create dropdown menus here
	return View::make('notes.create')->with('agents', $agent_list)->with('students', $student_list)->with('view',$view);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	$data=Input::all();
	#var_dump($data);
	#Check if the note concerns a student or agent
	#Adjust data 
	$data['staffuid'] = Auth::user()->id;
	#If the note is long, save as a file.
	echo "Testing";
	echo strlen($data['note']);
		echo "Testing 2";
		$filename = 'Testing';
		$data['filename'] = $filename;
		#$directory = GlobalHelpers::showGlobal('noteDirectory');
		$filePath = '/var/www/infosys/public/notes/Testing.txt';
		$a = File::put($filePath, $data['note']);
		#$upload_success = Input::file('file')->move($destinationPath, $filename);
		echo $a;	
	if($data['agent'] != 'A'){
		$data['referencetype']='agents';
		$data['referenceid'] = $data['agent'];
		Staffnote::create($data);
		}
	if($data['student'] != 'S'){
		$data['referencetype']='students';
		$data['referenceid'] = $data['student'];
		Staffnote::create($data);
		}
 	return Redirect::route('staffnotes.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	}
#Function to select individual students or agents to display notes pertaining to them
	public function selectindividual()
	{
	$view = Auth::user()->type;
	$agents = Agent::all();
	#var_dump($agents);
	$agent_data = array('A'=>'Select an Agent');
	foreach($agents as $agent){
		$agent_data[''.$agent->id.''] = ''.$agent->alname.', '.$agent->afname.'';
	}
	$students = Student::all();
	$student_data = array('S'=>'Select a Student');
	foreach($students as $student){
		$student_data[''.$student->id.''] = ''.$student->slname.', '.$student->sfname.'';
	}
	return View::make('staffnotes.selectindividual')->with('agent_data', $agent_data)->with('student_data', $student_data)->with('view', $view);
	}
######################################################################
#Function to display notes pertaining to an individual agent or student
#######################################################################
	public function listindividual()
	{
	$view = Auth::user()->type;
	$data = Input::all();
	$agent_list = Agent::all();
	$student_list = Student::all();
	#By default, all agent notes will be displayed unless an agent or student is chosen
	$select_type = 'agent';
	if ($data['agent'] != 'A'){
	#	$agent_list = Staffnote::where('referenceid','=', $data['agent'])->where('referencetype','=','agents')->get();
	$agent_list = DB::table('staffnotes')->join('users','users.id','=','staffnotes.staffuid')->select('staffnotes.date','staffnotes.note', 'staffnotes.referencetype', 'staffnotes.referenceid', 'users.id','users.ulname','users.ufname')->where('staffnotes.referenceid', '=', $data['agent'])->where('staffnotes.referencetype', '=', 'agents')->get(); 
		$name_data = Agent::findOrFail($data['agent']);
		
		}
	if ($data['student'] != 'S') {
		$select_type = 'student';
	#	$student_list = Staffnote::where('referenceid', '=', $data['student'])->where('referencetype','=','students')->get();
	$student_list = DB::table('staffnotes')->join('users','users.id','=','staffnotes.staffuid')->select('staffnotes.date','staffnotes.note', 'staffnotes.referencetype', 'staffnotes.referenceid', 'users.id','users.ulname','users.ufname')->where('staffnotes.referenceid', '=', $data['student'])->where('staffnotes.referencetype', '=', 'students')->get(); 
		$name_data = Student::findOrFail($data['student']);
		}
	return View::make('staffnotes.listindividual')->with('agent_data', $agent_list)->with('student_data', $student_list)->with('select_type', $select_type)->with('view',$view)->with('name_data',$name_data);
	}
}
