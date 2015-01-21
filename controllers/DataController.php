<?php

class DataController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	public function databaseTest(){
		//Determine if Database Exists
		$database_name = "infosys123"; 
		$result = DB::statement("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$database_name'");
		if($result == 1){
		$data = ["data" => "The database '".$database_name."' exists."];
		}
		else{

		$data = ["data" =>  "The database '".$database_name."' does not exist."];
		}
		return View::make("database/data_test", $data);

		// If yes, return error
		// If no, create the Database
		}
	public function databaseSelect(){
		//Perform a select query on a table in the database
	$result = DB::table('user')->get();	
$users_table = ["users_table"=>$result];
		return View::make("database/users_table", $users_table);
		}
}
