<?php

class Document extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ["sid", "description", "directory", "filename", "type", "expiry"];

	public function student() {
		return $this->hasOne('student');
		}

}

