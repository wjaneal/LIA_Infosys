<?php

class Agent extends \Eloquent {
	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ["alname", "afname","address", "postalcode", "city", "country", "cphone", "bphone","agenttype", "payeename", "bankinformation", "jobtitle", "paymentpreference","aid", "email", "website", "title","company"];
# 	protected $softDelete = True;
	}


