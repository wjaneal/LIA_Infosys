<?php

class ExpendituresController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	#This view should only be available to administrators
		if(Auth::user()->type=='admin'){
		$subcategories = DB::table('budget')->select('subcategory')->get();
		
		$subcategory_options = array();
		#Make a list of budget subcategories
		foreach($subcategories as $subcategory){
			$subcategory_options[$subcategory->subcategory] = $subcategory->subcategory;
		}
			$expenditures=DB::table('expenditures')->where('deleted_at', "=", "0000-00-00 00:00:00")->get();
			$budget = DB::table('budget')->get();
			#Total each subcategory expenditure
			$subcategory_totals = DB::table('expenditures')->select('subcategory', DB::raw('SUM(amount) as sum1'))->groupBy('subcategory')->get();
			return View::make('expenditures.index')->with('expenditures',$expenditures)->with('subcategory_options', $subcategory_options)->with('budget', $budget)->with('subcategory_totals', $subcategory_totals);		
			}
		else
			{
			#Redirect to another page if the user does not have admin credentials
			return Redirect::route('introduction.index');
			}
//
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	$expenditures = Expenditure::all();
	 $subcategories = DB::table('budget')->select('subcategory')->get();

                $subcategory_options = array();
                foreach($subcategories as $subcategory){
                        $subcategory_options[$subcategory->subcategory] = $subcategory->subcategory;
                }
                        $expenditures=DB::table('expenditures')->get();
                        return View::make('expenditures.create')->with('expenditures',$expenditures)->with('subcategory_options', $subcategory_options);

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
                $validator = Validator::make($data = Input::all(), Expenditure::$rules);
                if ($validator->fails())
                {
                        return Redirect::back()->withErrors($validator)->withInput();
                }
		$data['date'] =date("Y-m-d", strtotime($data['date']));

                Expenditure::create($data);
                return Redirect::route('expenditures.index');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
                return View::make('expenditures.show', ['expenditures'=>$expenditures, 'students'=>$students]);

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
                return View::make('expenditures.edit', ['expenditures'=>$expenditures, 'students'=>$students, 'student_options'=>$student_options]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	 $expenditures = Expenditure::findOrFail($id);
                $validator = Validator::make($data = Input::all(), Expenditure::$rules);
                if ($validator->fails())
                {
                        return Redirect::back()->withErrors($validator)->withInput();
                }
                $expenditures->update($data);
                return Redirect::route('expenditures.index');
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

                return Redirect::route('expenditures.index');
	
	//
	}


}
