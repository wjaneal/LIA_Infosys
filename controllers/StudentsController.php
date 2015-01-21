<?php

class StudentsController extends \BaseController {
	/**
	 * Display a listing of students
	 *
	 * @return Response
	 */
	public function index($view='None')
	{	
		if($view=='visaaccepted'){
			#Show all the students
			$students = DB::table('students')->where('status','=','Visa Accepted')->orderBy('slname','ASC')->orderBy('sfname', 'ASC')->get();
			$country_options = DB::table('countrieslists')->select('country_name')->groupBy('country_name')->get();
			return View::make('students.index')->with('students', $students)->with('countrieslists',$country_options);
		}
		else{
			if(Auth::user()->type == 'agent'){
				$id = Auth::user()->uid;
				$students = DB::table('students')->where('aid', '=', $id)->orderBy('slname', 'ASC')->orderBy('sfname', 'ASC')->get();
				$country_options = DB::table('countrieslists')->select('country_name')->groupBy('country_name')->get();
				return View::make('students.index')->with('students', $students)->with('countrieslists',$country_options)->with('view', 'agent');

				}
			elseif(Auth::user()->type == 'admin' or Auth::user()->type == 'staff'){
			#Show all the students
			$students = DB::table('students')->orderBy('slname', 'ASC')->orderBy('sfname', 'ASC')->get();
			$country_options = DB::table('countrieslists')->select('country_name')->groupBy('country_name')->get();
			return View::make('students.index')->with('students', $students)->with('countrieslists',$country_options)->with('view', 'admin');
			}
			else{
			return View::make('user.login');
			}
			}
	}

	public function status($view = 'normal')
	{
		$view = 	Auth::user()->type;
		if($view=='agent' || $view=='staff'||$view=='admin'){
			$agent_id = Auth::user()->uid;
			$students = DB::table('students')->orderBy('slname','ASC')->orderBy('sfname','ASC')->where('aid', '=',$agent_id)->get();
			return View::make('students.status')->with('students', $students)->with('view', $view);
			}
		else{
			return View::make('user/login');
		}

	}
	/**
	 * Show the form for creating a new student
	 *
	 * @return Response
	 */
	public function create($view='None')
		#Create Students
		{
		$view = Auth::user()->type;
		$students = Student::all();
		$countries = DB::table('countrieslists')->select('country_name')->orderBy('country_name', 'asc')->groupBy('country_name')->get();
		$parents = DB::table('parents')->select('lname', 'fname', 'id')->orderBy('lname', 'fname', 'asc')->get();
		$agents = DB::table('agents')->select('id', 'alname', 'afname')->orderBy('alname')->orderBy('afname')->get();
		$agent_options = array();
 		$agent_options[""] = "";
                for($i = 0; $i < sizeof($agents); $i++){
                        $object_extraction = $agents[$i];
                        $agent_options[$object_extraction->id] = $object_extraction->alname.', '.$object_extraction->afname;
                        }
		
		$country_options = array();
		$country_options[""] = "";
		for($i = 0; $i < sizeof($countries); $i++){
			$object_extraction = $countries[$i];
			$country_options[$object_extraction->country_name] = $object_extraction->country_name; 
			}	
		$parent_options = array();
		$parent_options[""] = "";
		for($i = 0; $i<sizeof($parents); $i++){
			$object_extraction = $parents[$i];
			$parent_options[$object_extraction->id] = $object_extraction->fname.', '.$object_extraction->lname;
				}
		return View::make('students.create')->with('students',$students)->with('country_options', $country_options)->with('parents',$parent_options)->with('agent_options', $agent_options)->with('view', $view);
	}

	/**
	 * Store a newly created student in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		#Store students with validation
		$validator = Validator::make($data = Input::all(), Student::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		if(isset($data['canada_doe'])){
			echo $data['dob'];
			$data['dob'] =date("Y-m-d", strtotime($data['dob']));
			$data['canada_doe'] =date("Y-m-d", strtotime($data['canada_doe']));
			$data['lia_doe'] =date("Y-m-d", strtotime($data['lia_doe']));
			}
		if(isset($data['assessment_date'])){
			$data['assessment_date'] =date("Y-m-d", strtotime($data['assessment_date']));
			}
		$data['grade']= 15;
		Student::create($data);
		/*if (Auth::check()){
			return Redirect::route('students.index');
			}
		else{
			return Redirect::to('http://www.lia-edu.ca');
		}*/
	}

	/**
	 * Display the specified student.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		#Not sure why this was commented out....
		$students = Student::findOrFail($id);
		$parents = DB::table('parents')->select('lname', 'fname', 'id')->orderBy('lname', 'fname', 'asc')->get();
		$agents = DB::table('agents')->select('id', 'alname', 'afname')->orderBy('alname')->orderBy('afname')->get();
		$agent_options = array();
 		$agent_options[""] = "";
                for($i = 0; $i < sizeof($agents); $i++){
                        $object_extraction = $agents[$i];
                        $agent_options[$object_extraction->id] = $object_extraction->alname.', '.$object_extraction->afname;
                        }

		return View::make('students.show', ['students'=>$students, 'parents'=>$parents, 'agents'=>$agents, 'agent_options'=>$agent_options]);
	}

	/**
	 * Show the form for editing the specified student.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		#Edit students
		$students = Student::find($id);
		$parents = DB::table('parents')->select('lname', 'fname', 'id')->orderBy('lname', 'fname', 'asc')->get();
		$parent_options = array();
		$parent_options[""] = "";
		for($i = 0; $i<sizeof($parents); $i++){
			$object_extraction = $parents[$i];
			$parent_options[$object_extraction->id] = $object_extraction->fname.', '.$object_extraction->lname;
			}
		$agents = DB::table('agents')->select('id', 'alname', 'afname')->orderBy('alname')->orderBy('afname')->get();
		$agent_options = array();
 		$agent_options[""] = "";
                for($i = 0; $i < sizeof($agents); $i++){
                        $object_extraction = $agents[$i];
                        $agent_options[$object_extraction->id] = $object_extraction->alname.', '.$object_extraction->afname;
                        }

		return View::make('students.edit', ['students'=>$students,'parents'=>$parent_options, 'agent_options'=>$agent_options]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		#Update student records
		$students = Student::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Student::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		if($students->status != $data['status'] && $data['status'] == 'Visa Accepted'){
			#send an email
			$contact = 'william.j.a.neal@gmail.com';
			$from = 'wneal@lia-edu.ca';
			$subject = 'Student Arrival Information: '.$data['slname'].', '.$data['sfname']; 
			$message_content = 'The student is arriving on the following date: '.$data['lia_doe']; 
 			Mail::send('user/arrival', array('firstname' => 'William', 'lastname'=>'Neal', 'message_content'=>''.$message_content.''), function($message) use ($contact, $from, $subject){$message->to('william.j.a.neal@gmail.com')->subject($subject)->from(''.$from.'');});
                }
		$students->update($data);

		return Redirect::route('students.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	#Delete a student
	{
		Student::destroy($id);

		return Redirect::route('students.index');
	}

	public function importstudents()
	#Special function designed to import students from a file exported from Inkwell...
		{
		$handle = @fopen("/var/www/inputfile.txt", "r");
		#Import handle from file uploads
		$data = array();
		$FNames = array();
		$LNames = array();
		$NNames = array();
		$TLNames = array();
		$TFNames = array();
		$classes = array();
		$student_list = array();
		$buffer_data = array();
		echo '<table border = 2>';
		if ($handle) {
			#$student_list = array();
	    		while (($buffer = fgets($handle, 4096)) !== false) {
	        	array_push($buffer_data, $buffer);
		        $words = preg_split('/\s+/',$buffer,-1,PREG_SPLIT_NO_EMPTY);
			#var_dump($words);
	        	$newrow = 0;
			$echo_list = 0;
			$current_student = array('slname'=>'EMPTY', 'sfname'=>'Empty','snname'=>'Empty');
		        foreach($words as $word){
		                if (is_numeric(substr($word,-1,1)) and $word <> "-01" and $word < 100){
		                        echo '<tr>';
		                        $echo_list = 5;
		                        $newrow = array();
					$current_student = array('slname'=>'EMPTY', 'sfname'=>'EMPTY', 'snname'=>'EMPTY');
		                        echo $word;
		                        }
                		if($echo_list > 0){
		                        echo '<td>'.$echo_list.', '.$word;
		                        $newrow[$echo_list] = $word;
					#Determine if the name is a teacher name; start a new class
					echo 'TitleCaseTest', $word, ucwords(strtolower($word));
				
					if($echo_list == 4 and ucwords(strtolower($word)) == $word){
						if(isset($new_class)){
							array_push($classes,$new_class);
							}
							if($word != '&' and $word != '-' and $word != '=' and $word !='&&' and $word != '63)'){
							$new_class = array('tlname'=>$word,'tfname'=>'EMPTY','class_list'=>array());
							var_dump($new_class);
							}
						echo '<td>'.$word.' TESTING';
						}
					#
					if($echo_list == 4 and strtoupper($word)==$word){
						$current_student['slname'] = $word;
						}
					if($echo_list == 3 and ucwords(strtolower($word))==$word){
						if(isset($new_class)){
							if($new_class['tfname']=='EMPTY'){
								$new_class['tfname'] = $word;
								}
							}
						}
					if($echo_list == 3 and strtoupper($word)==$word){
						$current_student['sfname'] = $word;
						}
					if($echo_list == 2 ){
						if(ctype_alpha($word)){
							$current_student['snname'] = $word;
							}
						elseif(strpos($word, '(') !== false){
							$current_student['snname'] =trim($word, '(');
							}
						}
					if($echo_list == 1){
					/*
					if the tlname and tfname are title case, set a new class and set the teacher's name; else, set a new student*/
						
	
						if (Stringhelpers::isTitleCase($current_student['slname']) and Stringhelpers::isTitleCase($current_student['sfname'])){
							if(isset($new_class)){
								array_push($classes,$new_class);
								}
						$new_class = array('tfname'=>$current_student['slname'], 'tlname'=>$current_student['sfname'], 'class_list'=>array());
						}	
						if($current_student['sfname'] != 'EMPTY'){	
							array_push($student_list, $current_student);
							}
						if(isset($new_class)){
							array_push($new_class['class_list'], $current_student);
							}
						#array_push($new_class['studentnames'],$current_student); 
						#var_dump($current_student);
						}
		                if($echo_list == 1){
		                        array_push($data, $newrow);
		                }
                		if ($echo_list>0 and $echo_list < 11){
                        		if(($echo_list >=3 or $echo_list <= 5) and !is_numeric($word)){
		                                array_push($data, $word);
						
                		                #echo $word;
                                		if(preg_match('/<br>/', $word)){
		                                        $newrow++;
                		                        }
                                		elseif(preg_match('/<br><br>/', $word)){
		                                        $newrow = 0;
                		                        }
						}
                                	else{
		                                }
                		        }
			        $echo_list--;
				}
	                }
		}
		 if (!feof($handle)) {
        		echo "Error: unexpected fgets() fail\n";
		    }
	    fclose($handle);

	echo '</table>';
#var_dump($classes);

#var_dump($buffer_data);
	foreach($buffer_data as $row){
        	$words = preg_split('/\s+/',$row,-1,PREG_SPLIT_NO_EMPTY);
	        #var_dump($words);
/*        	if(strlen($words[0]) ==5 and $words[1]<0 and is_numeric($words[1])){
                	echo $row;
                	}*/
        	}
#Generate and maintain the list of teachers
$student_checks = array();	
$teacher_check = ''; 
#Iterate through each item in $classes

foreach($classes as $class){
	#Check if tlname is set.
	if(ucwords(strtolower($class['tlname']))==$class['tlname']){
		#if so, generate a query to see if that teacher exists
		$teacher_check = DB::table('users')->where('ulname', '=', $class['tlname'])->where('ufname', '=', $class['tfname'])->get();
		#if the teacher does not exist, create and save a new teacher
		if(!isset($teacher_check[0])){
			#Changed to User - November 19, 2014
			$t = New User;
			$t->ulname = $class['tlname'];
			$t->ufname = $class['tfname'];
			$t->type = 'teacher';
			$t->save();
			}
		#Iterate through class list
		foreach($class['class_list'] as $student){
			$student_check = DB::table('students')->where('slname', '=', $student['slname'])->where('sfname', '=', $student['sfname'])->get();
			array_push($student_checks, $student_check);
			#var_dump($student_check);
			#check if slname and sfname exist in the table of students
			if(!isset($student_check[0])){
				#if not, create and save a new students	
				$stu = New Student;
				$stu->slname = $student['slname'];
				$stu->sfname = $student['sfname'];
				$stu->snname = $student['snname'];
				$stu->save();
				#Next, look up the new student id and adjust the enrolment table based on the current class.
				}
			}
		
		}
	}
#	return View::make('students.importstudents')->with('student_list', $student_list)->with('classes', $classes)->with('teacher_check', $teacher_check);
		}
	}
}
