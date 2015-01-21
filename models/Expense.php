<?php

class Expense extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['applicationfee','guardianshipfee', '  tuitiondeposit', 'tuitionsemester','tuitionshortsemester','tuitioncredit', 'accommsinglefour', 'accommsingletwo', 'accommdoublefour', 'accommdoubletwo', 'residencedeposit','mealfour', 'mealtwo', 'lunchonly', 'twomeals', 'lunchmonth', 'uniform','healthyear','healthsix', 'healththree', 'airport', 'total', 'date', 'invoicenumber', 'homestayfour','homestaytwo', 'scholarshipcredits', 'dicrectory', 'filename','depositpaid','credits','mealplan','scholarshiptotal','tuitionsem0','tuitionsem1','tuitionsem2','tuitionsem3','months', 'meals','accja','accsd','accjapr','accmj', 'activityfee'   ];


}
