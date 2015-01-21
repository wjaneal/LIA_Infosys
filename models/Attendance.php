<?php

class Attendance extends \Eloquent {
	protected $table = 'attendance';
	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ["sid", "cid", "date", "entry"];

}
