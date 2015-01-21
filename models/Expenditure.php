<?php

class Expenditure extends \Eloquent {
	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ["category", "subcategory", "amount", "description", "date"];
	protected $softDelete = true;
}

