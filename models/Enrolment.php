<?php

class Enrolment extends \Eloquent {
	protected $table = 'enrolment';
	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ["sid", "cid","date"];

}
