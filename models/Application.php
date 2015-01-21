<?php

class Application extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ["slname", "sfname", "country", "gender","street", "apartment", "city", "state", "postalcode", "email", "student_email_1", "englishlevel", "fatherfname", "fatherlname", "fatherdob", "fatheraddress", "fatehrcountry", "fatherstate", "fatherpostalcode", "fatherphone", "fatherfax", "fatheremail", "motherfname", "motherlname", "motherdob", "motheraddress", "mothercountry", "motherstate", "motherpostalcode", "motherphone", "motherfax", "motheremail", "flanguage", "immigration", "dob"   ];

}
