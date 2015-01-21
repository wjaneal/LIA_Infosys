<?php

class Staffnote extends \Eloquent {
	// Add your validation rules here
	public static $rules = [

	];

	// Don't forget to fill this array
	protected $fillable = ["referencetype", "referenceid", "date", "note", "staffuid", "directory", "filename","type"];
}
