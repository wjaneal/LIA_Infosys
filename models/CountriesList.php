<?php

class CountriesList extends \Eloquent {
	public $table = 'countrieslists';
	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

}
