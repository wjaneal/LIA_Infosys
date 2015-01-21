<?php

class Parents extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'lname'=>'required',
		'fname'=>'required',
		'parent'=>'required',
		'country'=>'required',
		'address1'=>'required',
		'email'=>'required',
		'phone'=>'required'
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ["lname", "fname","parent","country", "address1", "email", "fax", "postalcode","phone"];


}
