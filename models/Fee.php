<?php

class Fee extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'slname'=>'required',
		'sfname'=>'required',
		'country'=>'alpha_dash',
		'gender'=>'required',
		'student_email_1'=>'email',
		'flanguage'=>'alpha_dash',
		'immigration'=>'',
		'canada_doe'=>'date',
		'lia_doe'=>'date',
		'dob'=>'date',
		'assessment_date'=>'date',
		'education_note'=>'alpha_dash',
		'translator'=>'alpha_dash',
		'trans_relationship'=>'alpha_dash',
		'career'=>'alpha_dash',
		'recommendations'=>'alpha_dash',
		'agentid'=>'integer',
		'parent1'=>'integer',
		'parent2'=>'integer',
		'grade'=>'required|integer'

		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ["slname", "sfname","snname", "gender","country", "flanguage", "student_email_1", "parent1", "parent2","immigration"];

	public function languages() {
		return $this->hasMany('language');
		}

	public function flanguage(){
		return $this->hasOne('flanguage');
		}

	public function steps(){
		return $this->hasMany('step');
		}

	public function assessors(){
		return $this->hasMany('assessor');
		}

	public function classes(){
		return $this->hasMany('class');
	}	

	public function registrations(){
		return $this->belongsToOne('registration');
	}

}
