<?php

class Class1 extends \Eloquent {
	protected $table = 'classes';
	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ["code", "period", "tid", "rid"];

}
