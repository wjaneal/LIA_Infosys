<!--# This Source Code Form is subject to the terms of the Mozilla Public
# License, v. 2.0. If a copy of the MPL was not distributed with this
# file, You can obtain one at http://mozilla.org/MPL/2.0/.i-->
<?php
#Controls the list of the school's agents
#Calculates commissions from direct and indirect student referrals

class AgentsController extends \BaseController {
	/**
	 * Display a listing of agents
	 *
	 * @return Response
	 */

	public function index($view = 'normal')
	{
		#Show all the agents
		#Shows all of the agents to the admin user and only referred agents to individual agent users
		$id = Auth::user()->uid;
		$view = Auth::user()->type;
		if(Auth::user()->type == 'agent'){
			$agents = Agent::all();
			#Keep this for implementation with agents
			#To do: distinguish between staff and agents
			#$agents = DB::table('agents')->where('aid', '=', $id)->get();
			}
		elseif(Auth::user()->type == 'admin'){
			$agents = DB::table('agents')->orderBy('alname')->orderBy('afname')->get();
			}
		else
			{
			#If the agent has not referred other agents to the school, then the list is blank
			#Again, temporary fix while 'staff' is implemented as a use type
			$agents = Agent::all();
			}
		#Country lists have not yet been implemented
		$country_options = DB::table('countrieslists')->select('country_name')->groupBy('country_name')->get();
	        	
		return View::make('agents.index')->with('agents', $agents)->with('countrieslists',$country_options)->with('view', $view);
	}

	/**
	 * Show the form for creating a new agent
	 *
	 * @return Response
	 */
	public function create($view='admin')
		#Create Agents
		{
		$view = Auth::user()->type;
		$agents = DB::table('agents')->select('id', 'alname', 'afname')->orderBy('alname')->orderBy('afname')->get();
		$agent_options = array();
		$agent_options[""] = ""; 
		#The following code generates a list of agents for a drop-down list
		for($i = 0; $i < sizeof($agents); $i++){
			$object_extraction = $agents[$i];
			$agent_options[$object_extraction->id] = $object_extraction->alname.', '.$object_extraction->afname;
			}
		#Countries not yet implemented
		$countries = DB::table('countrieslists')->select('country_name')->orderBy('country_name', 'asc')->groupBy('country_name')->get();
		$country_options = array();
		$country_options[""] = "";
		for($i = 0; $i < sizeof($countries); $i++){
			$object_extraction = $countries[$i];
			$country_options[$object_extraction->country_name] = $object_extraction->country_name; 
			}	
		return View::make('agents.create')->with('agents',$agents)->with('country_options', $country_options)->with('agent_options', $agent_options)->with('view', $view);
	}

	/**
	 * Store a newly created agent in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		#Store agents with validation
		$validator = Validator::make($data = Input::all(), Agent::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		#No particular code yet needed for storing new agents
		Agent::create($data);

		return Redirect::route('agents.index');
	}

	/**
	 * Display the specified agent.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$view = Auth::user()->type;
		#Not sure why this was commented out....
		$agent = Agent::find($id);
		#Straightforward show function for individual agent records
		return View::make('agents.show', ['agent'=>$agent])->with('view', $view);
	}

	/**
	 * Show the form for editing the specified agent.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		#Edit agents
		$agents = Agent::find($id);
		$view = Auth::User()->type;
		return View::make('agents.edit', ['agents'=>$agents, 'view'=>$view]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		#Update agent records
		$agents = Agent::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Agent::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$agents->update($data);

		return Redirect::route('agents.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	#Delete a agent
	{
		Agent::destroy($id);

		return Redirect::route('agents.index');
	}


	public function refer()
	# Refer an Agent
	{
		#This view allows an agent to refer another agent to the school
		$agents = DB::table('agents')->orderBy('alname')->orderBy('afname')->get();
		$countries = DB::table('countrieslists')->select('country_name')->orderBy('country_name', 'asc')->groupBy('country_name')->get();
		$country_options = array();
		$country_options[""] = "";
		for($i = 0; $i < sizeof($countries); $i++){
			$object_extraction = $countries[$i];
			$country_options[$object_extraction->country_name] = $object_extraction->country_name; 
			}	
		return View::make('agents.refer')->with('agents',$agents)->with('country_options', $country_options);
	}


	public function pendingcommissions()
	#Calculate and display pending commissions of agents
	#This view can be expanded to include pending (student applied), confirmed (student arrived) and paid (student passed the refund deadline) commissions
	{
	$view = Auth::user()->type;
	$id = Auth::user()->uid;
	$agent = Agent::find($id);
	#Determine list of students for this agent
	$student_list = DB::table('students')->where('aid', '=', $id)->get();
	$invoices = DB::table('expenses')->join('students', 'students.id', '=', 'expenses.sid')->where('students.aid','=',$id)->select('expenses.id','expenses.sid', 'students.slname', 'students.sfname', 'students.grade', 'expenses.date','expenses.tuitionsem0amount', 'expenses.tuitionsem1amount', 'expenses.tuitionsem2amount', 'expenses.tuitionsem3amount')->get();
	$numstudents = sizeof($invoices);
	$commission = 0;
	#Determine number of students with paid deposits and, thus, commission level
	$invoice_list = array();
	#For each student, check if there are invoices.
	foreach($student_list as $student){
		$invoice_list[$student->id] = array();
		foreach($invoices as $invoice){
			$invoice_list[$student->id][$invoice->id] = array(); 
			#Include a reference here to pending, payable or paid
			if($invoice->sid == $student->id){
				#Wherever there is an invoice for a student, add to the tuition total and calculate the resulting commission
				$total_tuition = $invoice->tuitionsem0amount+$invoice->tuitionsem1amount+$invoice->tuitionsem2amount+$invoice->tuitionsem3amount;
				$commission_temp = CommissionHelpers::commission_calc($total_tuition, $student->grade, $numstudents);
				$invoice_list[$student->id][$invoice->id]['amount'] = $commission_temp;
				$commission +=$commission_temp;
				}
			}
		}
	#Send data to view
	return View::make('agents.pendingcommissions')->with('invoice_list', $invoice_list)->with('student_list', $student_list)->with('commission', $commission)->with('invoices', $invoices)->with('numstudents',$numstudents)->with('agent', $agent);
	echo $id;
	}

	public function metacommissions()
	#This function calculates payable commissions for an agent that has referred other agents.  The meta agent gets paid on commission differentials 
	#wherever the agent's commission bracket is above that of the sub agents.
	{
	$id = Auth::user()->uid;
	$agent=Agent::find($id);
	#Determine and display meta-commission information
	#1 - Check if agent represented by $id is a meta agent - query number of agents connected to this agent
	$sub_agents = DB::table('agents')->where('aid', '=', $id)->get();
	$numagents = sizeof($sub_agents);
	$totalstudents = 0;
	#2 - For each of these agents, find the # of students, and the sum of their commissions
	$meta_agent_data = array();
	$meta_commission = 0;
	if(sizeof($sub_agents > 0)){
		foreach($sub_agents as $agent){
			$numstudentcheck = DB::table('expenses')->join('students', 'students.id', '=', 'expenses.sid')->where('students.aid', '=', $agent->id)->select('expenses.sid')->groupBy('expenses.sid')->get();
			$numstudents = sizeof($numstudentcheck);
			$totalstudents+=$numstudents;	
			}
		foreach($sub_agents as $agent){
			$meta_agent_data[$agent->id] = array();
			$afname = $agent->afname;
			$alname = $agent->alname;
			$agent_name = $alname.', '. $afname;
			$student_list = DB::table('students')->where('aid', '=', $agent->id)->get();
			$invoices = DB::table('expenses')->join('students', 'students.id', '=', 'expenses.sid')->where('students.aid','=',$agent->id)->select('expenses.id','expenses.sid', 'students.slname', 'students.sfname', 'students.grade', 'expenses.date','expenses.tuitionsem0amount', 'expenses.tuitionsem1amount', 'expenses.tuitionsem2amount', 'expenses.tuitionsem3amount')->get();
			$numstudentcheck = DB::table('expenses')->join('students', 'students.id', '=', 'expenses.sid')->where('students.aid', '=', $agent->id)->select('expenses.sid')->groupBy('expenses.sid')->get();
			$numstudents = sizeof($numstudentcheck);
			$commission = 0;
			#Determine number of students with paid deposits and, thus, commission level
			$invoice_list = array();
			foreach($student_list as $student){
			$invoice_list[$student->id] = array();
			foreach($invoices as $invoice){
				$invoice_list[$student->id][$invoice->id] = array(); 
				#Include a reference here to pending, payable or paid
				if($invoice->sid == $student->id){
					$total_tuition = $invoice->tuitionsem0amount+$invoice->tuitionsem1amount+$invoice->tuitionsem2amount+$invoice->tuitionsem3amount;
					$commission_temp = CommissionHelpers::commission_differential($totalstudents, $numstudents, $student->grade, $total_tuition);
					$invoice_list[$student->id][$invoice->id]['amount'] = $commission_temp;
					$commission +=$commission_temp;
					}
				}
			}
			$meta_agent_data[$agent->id]['commission'] = $commission;
			$meta_agent_data[$agent->id]['invoice_list'] = $invoice_list;
			$meta_agent_data[$agent->id]['invoices'] = $invoices;
			$meta_agent_data[$agent->id]['student_list'] = $student_list;
			$meta_agent_data[$agent->id]['numstudents'] = $numstudents;
			$meta_agent_data[$agent->id]['name'] = $agent_name;
			$meta_commission += $commission;
			}
			if(!isset($invoice_list)){
				$invoice_list = '';
				$invoices = "";
				}
			return View::make('agents.metacommissions')->with('meta_agent_data', $meta_agent_data)->with('meta_commission', $meta_commission)->with('totalstudents', $totalstudents)->with('numagents', $numagents)->with('agent', $agent)->with('sub_agents', $sub_agents)->with('invoice_list', $invoice_list)->with('invoices', $invoices)->with('view', $view);
		}
	else{
	return View::make('agents.metacommissions')->with('view', $view);
	}
		
	}

public function introduction(){
	$view=Auth::user()->type;
	return View::make('agents.introduction')->with('view',$view);
	}


public function confirm(){
/* $file = Input::file('file');
        $image_file = Input::file('image');
        $datafilename = $file->getClientOriginalName();
        $imagefilename = $image_file->getClientOriginalName();
        $from = Input::get('from');
        $subject = Input::get('subject');
        $message_content = Input::get('message_content');
        $destinationPath = 'uploads';

        //$filename = $file->getClientOriginalName();

        //$extension =$file->getClientOriginalExtension();
        $upload_success = Input::file('file')->move($destinationPath, $datafilename);
        $image_success = Input::file('image')->move($destinationPath, $imagefilename);
        if( $upload_success && $image_success) {

        $path= public_path();
        $csv = array_map('str_getcsv', file($path.'/uploads/'.$datafilename));
        foreach($csv as $contact){
                if(sizeof($contact) > 1){
                        Cache::flush();
                        Mail::send('user/welcome', array('firstname' => ''.$contact[0].'', 'lastname'=>'Neal', "image_path"=>$destinationPath."/".$imagefilename, 'message_content'=>''.$message_content.''), function($message) use ($contact, $from, $subject){$message->to(''.$contact[1].'', 'Hello')->subject($subject)->from(''.$from.'');});
                      mail("william.j.a.neal@gmail.com", "Testing" , "Testing 123");
                }
        }
           return View::make('user/emailsend');

        } else {
           return Response::json('error', 400);
        }
        return View::make("user/emailaction");
}

	return View::make('agents.confirm');*/
	}
public function confirmation($aid){
	return View::make('students.index');
	}
public function decline($aid){
	return View::make('parents.index');
	}
}
