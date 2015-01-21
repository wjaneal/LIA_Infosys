<?php
#Plan:

#All views are accesses as either pre-auth, admin, agent or staff (teacher later? User types are stored and accessed through user->type))
#Unique layouts for admin, staff, teacher, agent roles
#Soft deletes implemented and checked
	#Delete linked records from other tables when soft-deleting

#Pre-auth group:  Register, Login
#Admin group
	#All pages
#Staff group:
	#Introduction, (Students: Document Upload, New Student with Picture, Student Status, Edit), (Agents: New Agent with Picture, Edit, Commissions, Metacommissions, School Information, Email Actions), (Notes: New, Edit, List, Individual, Contact Reminder)
	#All staff authorized pages
#Agent group
	#Limited pages
	#All data filtered to connect only with agent

#Route groups:  all views opened to guests in 'before' group
#All views open to authenticated users in Auth group
#Views particular to agents, staff or teachers in respective group (admins access all of these)
#Views restricted to only admins in admin group
Route::group(["before" => "guest"], function()
{
#Guest functions:
    Route::any("/", [
        "as"   => "user/login",
        "uses" => "UserController@loginAction"
    ]);
    Route::any("/user/login", [
        "as"   => "user/login",
        "uses" => "UserController@loginAction"
    ]);
    Route::any("/user/register", [
        "as"   => "user/register",
        "uses" => "UserController@register"
    ]);
    Route::any("/user/newuser", [
        "as"   => "user/newuser",
        "uses" => "UserController@newuser"
    ]);
    Route::any("/request", [
        "as"   => "user/request",
        "uses" => "UserController@requestAction"
    ]);
    Route::any("/reset", [
        "as"   => "user/reset",
        "uses" => "UserController@resetAction"
    ]);
});
Route::group(["before" => "auth"], function()
{
#User Actions:
    Route::any("/welcome", [
        "as"   => "user/welcome",
        "uses" => "UserController@welcome"
    ]);
    Route::any("/profile", [
        "as"   => "user/profile",
        "uses" => "UserController@profileAction"
    ]);
    Route::any("/logout", [
        "as"   => "user/logout",
        "uses" => "UserController@logoutAction"
    ]);
    Route::any("/user/emailagents", [
        "as"   => "user/emailagents",
        "uses" => "UserController@emailAgents"
    ]);
    Route::any("/emaillistupload", [
        "as"   => "user/emaillistupload",
        "uses" => "UserController@emaillistUpload"
    ]);
    Route::any("/emailaction", [
        "as"   => "user/emailaction",
        "uses" => "UserController@emailAction"
    ]);
    Route::any("/emailsend", [
        "as"   => "user/emailsend",
        "uses" => "UserController@emailSend"
    ]);

#Student Routes:
    Route::any("/students/status", [
	"as" => "students/status", 
	"uses" => "StudentsController@status"
    ]);
    Route::any("/students/status/{view}", [
	"as" => "students/status", 
	"uses" => "StudentsController@status"
    ]);
     Route::any("/students/create/{view}", [
	"as" => "students/create", 
	"uses" => "StudentsController@create"
    ]);
   Route::any("/students/importstudents", [
        "as" => "students/importstudents", 
        "uses" => "StudentsController@importstudents"
    ]);
    Route::any('/studentsteps/selectelement',  ['as'=>'studentsteps/selectelement', 'uses'=>'StudentstepsController@selectelement']);
    Route::any('/studentsteps/assesselement',  ['as'=>'studentsteps/assesselement', 'uses'=>'StudentstepsController@assesselement']);
 #Parent Routes
     Route::any("/parents/create/{view}", [
	"as" => "parents/create", 
	"uses" => "ParentsController@create"
   ]);
  Route::any("/parents/show/{id}", [
	"as" => "parents/show/{id}", 
	"uses" => "ParentsController@show"
    ]);
#Agent Routes:
     Route::any("/agents/introduction", [
	"as" => "agents/introduction", 
	"uses" => "AgentsController@introduction"
    ]);
     Route::any("/agents/index/{view}", [
	"as" => "agents/index", 
	"uses" => "AgentsController@index"
    ]);
     Route::any("/agents/create/{view}", [
        "as" => "agents/create",
        "uses" => "AgentsController@create"
    ]);
    Route::any("/agents/confirm", [
        "as"   => "agents/confirm",
        "uses" => "AgentsController@confirm"
    ]);
    Route::any("/agents/confirmation", [
        "as"   => "agents/confirmation",
        "uses" => "AgentsController@confirmation"
    ]);
    Route::any("/agents/decline", [
        "as"   => "agents/decline",
        "uses" => "AgentsController@decline"
    ]);
    Route::any('/agents/pendingcommissions', ['as'=>'agents/pendingcommissions', 'uses'=>'AgentsController@pendingcommissions']);
    Route::any('/agents/metacommissions', ['as'=>'agents/metacommissions', 'uses'=>'AgentsController@metacommissions']);
#Information Routes:
     Route::any("/information", [
	"as" => "information", 
	"uses" => "InformationController@index"
    ]);
#Document Routes:
    Route::any("/documents/create/{view}", [
	"as" => "documents/create", 
	"uses" => "DocumentController@create"
    ]);
#Note Routes:
   Route::any("/notes", [
        "as"   => "notes",
        "uses" => "NotesController@index"
    ]);
    Route::any("/notes/create/{view}", [
        "as"   => "notes/create",
        "uses" => "NotesController@create"
    ]);
    Route::any("/notes/selectindividual/{view}", [
        "as"   => "notes/selectindividual",
        "uses" => "NotesController@selectindividual"
    ]);
    Route::any("/notes/listindividual/{view}", [
        "as"   => "notes/listindividual",
        "uses" => "NotesController@listindividual"
    ]);
#Expense Routes:
    Route::any('/expenses/pdf',  ['as'=>'expenses/pdf', 'uses'=>'ExpensesController@pdf']);
    Route::any('/expenses/showindividual',  ['as'=>'expenses/showindividual', 'uses'=>'ExpensesController@showindividual']);
 #Expenditure Routes:

#Resource Routes:
	Route::resource("agents", "AgentsController");
	Route::resource("students", "StudentsController"); 
	Route::resource("documents", "DocumentController");
	Route::resource("expenditures", "ExpendituresController");
	Route::resource("expenses", "ExpensesController");
	Route::resource("parents", "ParentsController");
	Route::resource("notes", "NotesController" );
    	Route::resource("studentsteps", "StudentstepsController");
    	Route::resource("applications", "ApplicationsController");
        Route::resource("teachers" , "TeachersController");
        Route::resource("steps", "StepsController");
        Route::resource("fees", "FeesController");
        Route::resource("enrolments", "EnrolmentsController");
        Route::resource("referrals", "ReferralsController");

#Experimental Route - check and remove?
Route::get('pdf', function(){
        Fpdf::AddPage();
        Fpdf::SetFont('Arial','B',16);
        Fpdf::Cell(40,10,'London International Academy');
        Fpdf::Output();
        exit;
	});
#Database routes
#Referral Routes:
   Route::any('/referrals/showindividual',  ['as'=>'referrals/showindividual', 'uses'=>'ReferralsController@showindividual']);
#Invoice Routes:
   Route::any('/invoices/showindividual',  ['as'=>'invoices/showindividual', 'uses'=>'InvoicesController@showindividual']);
});

#All teacher-relevant routes here:
Route::group(["before"=>"teacher"],function(){
});
#All agent-relevant routes here; need separate controller functions to ensure data security
Route::group(["before"=>"agent"],function(){
});

#All routes except expenses here:
Route::group(["before"=>"staff"],function(){
});

#All routes available here; list only routes that are exclusive to admins:
Route::group(["before"=>"admin"],function(){
#Submit expenditure - restrict to admin for now.
	Route::post("expenditures/create", [
	'as' =>"expenditures/create",
	'uses' => "ExpendituresController@create"
	]);
});
