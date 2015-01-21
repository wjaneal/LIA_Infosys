<?php

class ExpensesController extends \BaseController {
	/**
	 * Display a listing of students
	 *
	 * @return Response
	 */
	public function index()
	{
		$view = Auth::user()->type;	
		#Show all expenses
		#This table name should be changed to invoices
		#show this only for administrators
		$expenses = DB::table('expenses')->get();
		$students = Student::all();
		return View::make('expenses.index')->with('students', $students)->with('expenses',$expenses)->with('view', $view);
	}

	public function create()
		{
		$view=Auth::user()->type;
		#Create Students
		$expenses = Expense::all();
		#Choose a date far in the past as the base date
  	 	$lastdate = '2000-01-01';
                $id = 0;
		$lastid=2;
		#Find the most recent Fee schedule:
		$fees = Fee::all();
                foreach($fees as $fee){
                        if ($fee['date'] < $lastdate){
                                $lastdate = $fee['date'];
                                $lastid = $fee['id'];
                        }
                }
                $fees = Fee::find($lastid);#The index $id now should represent the most recent fee schedule
#$fees=Fee::find(2);

			$students = DB::table('students')->select('slname', 'sfname', 'id')->orderBy('slname', 'sfname', 'asc')->get();
  
			$student_options = array();
                	$student_options[""] = "";
	                for($i = 0; $i<sizeof($students); $i++){
        	                $object_extraction = $students[$i];
                	        $student_options[$object_extraction->id] = $object_extraction->sfname.', '.$object_extraction->slname;
                        	}

			return View::make('expenses.create')->with('student_options',$student_options)->with('fees',$fees)->with('view', $view);
	}

	/**
	 * Store a newly created student in storage.
	 *
	 * @return Response
	 */
	/*
	Create a PDF file with code as follows:
	$pdf = PDF::loadView('pdf.invoice', $data);
	return $pdf->download('invoice.pdf');
	*/

	public function store()
	{

		$new_expense = New Expense;
		$pdf_data = array();
		$fees=Fee::all()->toArray();
		#------------
		#Select the most recent fee schedule; (somehow can't manage to do this properly with DB:: or with Fee::)
		$lastdate = '2000-01-01';
		$id = 0;
		foreach($fees as $fee){
			if ($fee['date'] > $lastdate){
				$lastdate = $fee['date'];
				$lastid = $fee['id'];
			}
		}
		$fees = Fee::find($lastid);#The index $id now should represent the most recent fee schedule
#		$fees = Fee::find(2);
		#---------------
		#Store students with validation
		$validator = Validator::make($data = Input::all(), Expense::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$total=0; #Initialize the invoice total to 0 - 
		$student = Student::where('id', '=', $data['student'])->firstOrFail();
		$months = 0; #Default months to 0

		#Start of lengthy if block - apply tuition deposit or everything else
	
			#Calculate the amount that fees add to the total
			$total+=$data['applicationfee']*$fees['applicationfee'];
			$total+=$data['activityfee']*$fees['activityfee'];	
			$total+=$data['guardianshipfee']*$fees['guardianshipfee'];	
			$total+=$data['materialsfee']*$fees['materialsfee'];
			$total+=$data['uniform']*$fees['uniform'];
			$total+=$data['airport']*$fees['airport'];
			$total+=$data['residencedeposit'];
			$total+= intval($data['tuitiondeposit']);
	
			$new_expense->student = $data['student'];	
			#Initialize fees at 'false':
			$new_expense->applicationfee = false;
			$new_expense->activityfee = false;
			$new_expense->guardianshipfee = false;
			$new_expense->uniform = false;
			$new_expense->airport = false;	
			$new_expense->materialsfee = false;
			$new_expense->depositpaid = intval($data['depositpaid']);
			$new_expense->residencedeposit = $data['residencedeposit'];
			$new_expense->tuitiondeposit = intval($data['tuitiondeposit']);
	
			
			#Apply fees to the expense record
			if($data['applicationfee']>0){
				$new_expense->applicationfee = true;
				}
			if($data['activityfee']>0){ 
				$new_expense->activityfee = true;
				}
			if($data['guardianshipfee']>0){
				$new_expense->guardianshipfee = true;
				}
			if($data['uniform']>0){
				$new_expense->uniform = true;
				}
			if($data['airport']>0){
				$new_expense->airport = true;
					}
			if($data['materialsfee']>0){
				$new_expense->materialsfee = true;
					}
			$HomestayMonths = 0;
			#Accommodation - Calculate totals

			$new_expense->acc0amount = 0;
			$new_expense->acc1amount = 0;
			$new_expense->acc2amount = 0;
			$new_expense->acc3amount = 0;
			if($data['acc0'] == 2){
				$total+=$fees['accommsingletwo'];
				$new_expense->acc0amount = $fees['accommsingletwo'];
				$months+=2;
				}
			elseif($data['acc0'] == 1){
				$total+=$fees['accommdoubletwo']; 
				$new_expense->acc0amount=$fees['accommdoubletwo']; 
				$months+=2;
				}
			elseif($data['acc0'] == 3){
				$total+=$fees['homestaytwo']; 
				$new_expense->acc0amount=$fees['homestaytwo']; 
				$HomestayMonths+=2;
				}
			else
				{
				$new_expense->acc0amount = 0;
				}
				
			if($data['acc1'] == 2){
				$total+=$fees['accommsinglefour'];
				$new_expense->acc1amount = $fees['accommsinglefour']; 
				$months+=4;
				}
			elseif($data['acc1'] == 1){
				$total+=$fees['accommdoublefour']; 
				$new_expense->acc1amount=$fees['accommdoublefour']; 
				$months+=4;
				}
			elseif($data['acc1'] == 3){
				$total+=$fees['homestayfour']; 
				$new_expense->acc1amount=$fees['homestayfour']; 
				$HomestayMonths+=4;
				}
			else{
				$new_expense->acc1amount = 0;
				}

			if($data['acc2'] == 2){
				$total+=$fees['accommsinglefour'];
				$new_expense->acc2amount = $fees['accommsinglefour']; 
				$months+=4;
				}
			elseif($data['acc2'] == 1){
				$total+=$fees['accommdoublefour']; 
				$new_expense->acc2amount=$fees['accommdoublefour']; 
				$months+=4;
				}
			elseif($data['acc2'] == 3){
				$total+=$fees['homestayfour']; 
				$new_expense->acc2amount=$fees['homestayfour']; 
				$HomestayMonths+=4;
				}
			else{
				$new_expense->acc2amount = 0;
				}
			if($data['acc3'] == 2){
				$total+=$fees['accommsingletwo'];
				$new_expense->acc3amount = $fees['accommsingletwo']; 
				$months+=2;
				}
			elseif($data['acc3'] == 1){
				$total+=$fees['accommdoubletwo']; 
				$new_expense->acc3amount=$fees['accommdoubletwo']; 
				$months+=2;
				}
			elseif($data['acc3'] == 3){
				$total+=$fees['homestaytwo']; 
				$new_expense->acc3amount=$fees['homestaytwo']; 
				$HomestayMonths+=2;
				}
			else{
				$new_expense->acc3amount=0;				
				}
	
			
			#Manage deposits
			$total-=(int) $data['depositpaid']; #Remove Previously paid deposits (must be accurately entered...)

			
			$new_expense->tuitionsem0amount = 0;
			$new_expense->tuitionsem1amount = 0;
			$new_expense->tuitionsem2amount = 0;
			$new_expense->tuitionsem3amount = 0;


			#Calculate tuition - apply correct fees according to number of credits
			if($data['tuitionsem0']==2){
				$new_expense->tuitionsem0amount=$fees['tuitionshortsemester'];
				}
			else	{
				$new_expense->tuitionsem0amount=$fees['tuitioncredit']*$data['tuitionsem0'];	
				}
			if($data['tuitionsem1']==4){
				$new_expense->tuitionsem1amount=$fees['tuitionsemester'];
				}
			else	{
				$new_expense->tuitionsem1amount=$fees['tuitioncredit']*$data['tuitionsem1'];	
				}
			if($data['tuitionsem2']==4){
				$new_expense->tuitionsem2amount=$fees['tuitionsemester'];
				}
			else	{
				$new_expense->tuitionsem2amount=$fees['tuitioncredit']*$data['tuitionsem2'];	
				}
			if($data['tuitionsem3']==2){
				$new_expense->tuitionsem3amount=$fees['tuitionshortsemester'];
				}
			else	{
					$new_expense->tuitionsem3amount=$fees['tuitioncredit']*$data['tuitionsem3'];	
				}
			$total+=$new_expense->tuitionsem0amount+$new_expense->tuitionsem1amount+$new_expense->tuitionsem2amount+$new_expense->tuitionsem3amounti;
			$new_expense->tuitionsem0 = $data['tuitionsem0'];
			$new_expense->tuitionsem1 = $data['tuitionsem1'];
			$new_expense->tuitionsem2 = $data['tuitionsem2'];
			$new_expense->tuitionsem3 = $data['tuitionsem3'];


			$new_expense->credits = $data['tuitionsem0']+$data['tuitionsem1']+$data['tuitionsem2']+$data['tuitionsem3'];
			$new_expense->scholarshiptotal = $data['scholarshipcredits']*$fees['tuitionsemester']/4;
			$new_expense->scholarshipcredits = $data['scholarshipcredits'];
			$total-=$new_expense->scholarshiptotal;	

			#Calculate meal expenses:
			$new_expense->meals = 0;
			if($data['meals']=='full'){
				$new_expense->mealplan='Three';
				if($data['acc0']=='Residence - Single' || $data['acc0']=='Residence - Double'){
					$new_expense->meals += $fees['mealtwo'];
					$total+= $fees['mealtwo'];
					}
				if($data['acc1']=='Residence - Single' || $data['acc1']=='Residence - Double'){
					$new_expense->meals += $fees['mealfour'];
					$total+= $fees['mealfour'];
					}
				if($data['acc2']=='Residence - Single' || $data['acc2']=='Residence - Double'){
					$new_expense->meals += $fees['mealfour'];
					$total+= $fees['mealfour'];
					}
				if($data['acc3']=='Residence - Single' || $data['acc3']=='Residence - Double'){
					$new_expense->meals += $fees['mealfour'];
					$total+= $fees['mealtwo'];
					}
				}
			elseif($data['meals'] == 'two'){
				$new_expense->mealplan="Two";
				$new_expense->meals+=$fees['mealtwo']*$months;
				$total+=$fees['mealtwo']*$months;
				}
			elseif($data['meals']=='lunch'){
				$new_expense->mealplan="Lunch";
				$new_expense->meals+=$fees['lunchonly']*$months;
				$total+=$fees['lunchonly']*$months;
				}
			else{
				$new_expense->mealplan="None";
				$new_expense->meals = 0;	
				}
			$new_expense->acc0 = $data['acc0'];
			$new_expense->acc1 = $data['acc1'];
			$new_expense->acc2 = $data['acc2'];
			$new_expense->acc3 = $data['acc3'];
			
			#Calculate Homestay Fees Depending on monthly rate and number of months:
			$new_expense->homestayfee = $data['homestayfee']*$months;
			$total+= $new_expense->homestayfee;

			#Apply health insurance fees:
			$new_expense->healthyear = false;
			$new_expense->healthsix = false;
			$new_expense->healththree = false;
			if ($data['health'] == 12){
				$total+=$fees['healthyear'];
				$new_expense->healthyear = true;
				$new_expense->healthamount = $fees['healthyear'];
				}
			elseif ($data['health'] == 6){
				$total+=$fees['healthsix'];
				$new_expense->healthsix = true;
				$new_expense->healthamount=$fees['healthsix'];
				}
			elseif ($data['health']== 3){
				$total+=$fees['healththree'];
				$new_expense->healththree = true;
				$new_expense->healthamount=$fees['healththree'];
				}
			else {
				$total+=0;
				$new_expense->healthamount=0;
				}
			$new_expense->health = $data['health'];
			#Data required by each expense record:
			$firstinitial =substr($student['sfname'], 0,1);
			$lastinitial = substr($student['slname'], 0,1);
			$fulldate = explode('-', $data['date']);
			$timenow = time("gi");
			$new_expense->filename=$firstinitial.$lastinitial.$fulldate[0].$fulldate[1].$fulldate[2].$timenow.'inv.pdf';
			$new_expense->directory='invoices';
			$new_expense->date=$data['date'];
			$new_expense->months = $months;
			$new_expense->sid = $data['student'];
			$new_expense->total = $total;	
			$new_expense->save();
			$result = Expense::where('filename', $new_expense->filename)->get();
			$eid=$result[0]->id;
			$result = Expense::where('filename', $new_expense->filename)->update(array('invoicenumber'=>"MKT - ".date("Y")." ".$eid));	
			$new_expense->invoicenumber = "MKT ".date("Y")." ".$eid;
			$new_expense->save();
		#Compile the data for the PDF file:
		$pdf_data['sid'] = $data['student'];
		$pdf_data['months']= $months;
		$pdf_data['total'] = $total;
		$pdf_data['slname'] = $student['slname'];
		$pdf_data['sfname'] = $student['sfname'];
		$pdf_data['new_expense'] = $new_expense;
		$pdf_data['fees']=$fees;
		require_once("/var/www/infosys/vendor/dompdf/dompdf/dompdf_config.inc.php");
               // You can use raw HTML or a blade template, i made a pdf folder within *views* for my templates.
                $html =  View::make('expenses.pdf')->with('pdf_data', $pdf_data);

                $dompdf = new DOMPDF();
                $dompdf->load_html($html);
                $dompdf->render();

                // Use this to output to the broswer
                #$dompdf->stream('my.pdf',array('Attachment'=>0));
                // Use this to download the file.
                // $dompdf->stream("my.pdf");

                $filename = $firstinitial.$lastinitial.$fulldate[0].$fulldate[1].$fulldate[2].$timenow.'inv.pdf';
                $destinationPath = 'invoices';
#                $upload_success = $dompdf->move($destinationPath, $filename);
                file_put_contents($destinationPath."/".$filename, $dompdf->output());

	
		return Redirect::route('expenses.index');
		
	}

	public function pdf()
	{
	$pdf_data= Session::get('pdf_data');
   // YOU NEED THIS FILE BEFORE YOU CAN RUN DOMPDF <-- im sure someone has a better way of referencing it for Laravel?
		require_once("/var/www/infosys/vendor/dompdf/dompdf/dompdf_config.inc.php");
               // You can use raw HTML or a blade template, i made a pdf folder within *views* for my templates.
		$html =  View::make('expenses.pdf')->with('pdf_data', $pdf_data); 

		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
		$dompdf->render();

		// Use this to output to the broswer
		#$dompdf->stream('my.pdf',array('Attachment'=>0));
		// Use this to download the file.
		// $dompdf->stream("my.pdf");
		
                $filename = "testpdf1.pdf";
                $destinationPath = 'invoices';
#                $upload_success = $dompdf->move($destinationPath, $filename);
		file_put_contents($destinationPath."/".$filename, $dompdf->output());
		return View::make('students.index');
	
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
		$students = Student::all();
		$expenses = Expense::all();
		$fees=Fee::all();
		
		

		return View::make('expenses.show', ['students'=>$students, 'expenses'=>$expenses, 'fees'=>$fees]);
	}

	/**
	 * Show the form for editing the specified student.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$view=Auth::user()->type;
		$expenses = Expense::find($id);
		$fees=Fee::all();
		$students = DB::table('students')->select('slname', 'sfname', 'id')->orderBy('slname', 'sfname', 'asc')->get();
  
		$student_options = array();
                $student_options[""] = "";
                for($i = 0; $i<sizeof($students); $i++){
                        $object_extraction = $students[$i];
                        $student_options[$object_extraction->id] = $object_extraction->sfname.', '.$object_extraction->slname;
                        }
		return View::make('expenses.edit')->with('students',$students)->with('expenses',$expenses)->with('fees',$fees)->with('student_options',$student_options)->with('view', $view);
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
		$expenses = Expense::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Expenses::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$expenses->update($data);

		return Redirect::route('expenses.index');
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
		Expense::destroy($id);

		return Redirect::route('expenses.index');
	}
}
