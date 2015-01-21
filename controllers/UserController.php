<?php

use Illuminate\Support\MessageBag;

class UserController
extends Controller
{
    public function loginAction()
    {
        $errors = new MessageBag();

        if ($old = Input::old("errors"))
        {
            $errors = $old;
        }

        $data = [
            "errors" => $errors
        ];

        if (Input::server("REQUEST_METHOD") == "POST")
        {
            $validator = Validator::make(Input::all(), [
                "username" => "required",
                "password" => "required"
            ]);

            if ($validator->passes())
            {
                $credentials = [
                    "username" => Input::get("username"),
                    "password" => Input::get("password")
                ];

                if (Auth::attempt($credentials))
                {
                    return Redirect::route("user/profile");
                }
            }

            $data["errors"] = new MessageBag([
                "password" => [
                    "Username and/or password invalid."
                ]
            ]);

            $data["username"] = Input::get("username");

            return Redirect::route("user/login")
                ->withInput($data);
        }

        return View::make("user/login", $data);
    }

public function newuser(){
	if (Input::server("REQUEST_METHOD") == "POST")
        {
            $validator = Validator::make(Input::all(), [
                "username" => "required",
                "password" => "required"
            ]);
	    $data = Input::all();
            if ($validator->passes())
            {
	    $user = new User;
	    $user->username = $data['username'];
	    $user->ulname=$data['ulname'];
	    $user->ufname=$data['ufname'];
	    $user->password = Hash::make($data['password']); 
	    $user->type = $data['type']; //Expand later to include students / admins....
            $user->save();
            $contact = 'admissions@lia-edu.ca';
            $from = 'wneal@lia-edu.ca';
            $subject = 'Testing';
            $details = $user->ulname.', '.$user->ufname.'<br>+email';
            $message = 'An inquiry has been received through the website.<br>'.$details;
            #mail('william.j.a.neal@gmail.com', 'Testing Mail', 'Message 1');
            #Mail::send('user/mailtest', array('firstname' => "William", 'lastname'=>'Neal', 'message_content'=>$message), function($message) use ($contact, $from, $subject){$message->to($contact, $subject)->subject($subject)->from($from);});

            }

	return View::make("user/register");
	}
}
public function register(){
	return View::make("user/register");
}
public function emailListUpload()
{
	return View::make("user/emaillistupload");
}


public function emailAction()
{
	$file = Input::file('file');
	$image_file = Input::file('image');
	$datafilename = $file->getClientOriginalName();
	$imagefilename = $image_file->getClientOriginalName();
	$from = Input::get('from');
	$subject = Input::get('subject');
	$message_content = Input::get('message_content');
	$destinationPath = 'uploads';
	
	//$filename = $file->getClientOriginalName();
	
	//$extension =$file->getClientOriginalExtension();
	$upload_success = Input::file('file')->move($destinationPath, $datafilename);
	$image_success = Input::file('image')->move($destinationPath, $imagefilename);
	if( $upload_success && $image_success) {
	
	$path= public_path();
	$csv = array_map('str_getcsv', file($path.'/uploads/'.$datafilename));
	foreach($csv as $contact){
		if(sizeof($contact) > 1){
			Cache::flush();	
			Mail::send('user/welcome', array('firstname' => ''.$contact[0].'', 'lastname'=>'Neal', "image_path"=>$destinationPath."/".$imagefilename, 'message_content'=>''.$message_content.''), function($message) use ($contact, $from, $subject){$message->to(''.$contact[1].'', 'Hello')->subject($subject)->from(''.$from.'');});
/*			mail("william.j.a.neal@gmail.com", "Testing" , "Testing 123");*/
		}
	}
	   return View::make('user/emailsend');
	
	} else {
	   return Response::json('error', 400);
	}
	return View::make("user/emailaction");
}


public function emailAgents()
{
	$data = Input::all();
	#$country = $data['country'];
	$country = 'Canada';
	$agents = DB::table('agents')->where('country', '=', $country)->get();
	
	/*$file = Input::file('file');
	$image_file = Input::file('image');
	$datafilename = $file->getClientOriginalName();
	$imagefilename = $image_file->getClientOriginalName();*/
/*	$from = $data['from'];
	$subject = $data['subject'];
	$message_content = $data['message_content'];*/
	$from = 'wneal@lia-edu.ca'; 
	$subject = 'Testing';
	$message_content = 'Testing';
	/*$path= public_path();
	$csv = array_map('str_getcsv', file($path.'/uploads/'.$datafilename));
	foreach($csv as $contact){
		if(sizeof($contact) > 1){
			Cache::flush();	*/
	var_dump($agents);
	foreach($agents as $agent){
			Mail::send('agents/confirm', array('firstname' => ''.$agent->afname.'', 'lastname'=>''.$agent->alname.'', 'message_content'=>''.$message_content.''), function($message) use ($agent, $from, $subject){$message->to(''.$agent->email.'', 'Hello')->subject($subject)->from(''.$from.'');});
/*			mail("william.j.a.neal@gmail.com", "Testing" , "Testing 123");*/
		}
#	return View::make("agents");
}



public function emailSend()
{	
	$filename = 'data.csv';
	$csv = array_map('str_getcsv', file('uploads/'+$filename));
	var_dump($csv);
	foreach($csv as $contact){
		var_dump($csv);
		if(sizeof($contact) > 1){
			mail("william.j.a.neal@gmail.com", $contact[0], $contact[1]);
		}
	}
}

public function profileAction()
{
    return View::make("user/profile");
}

public function requestAction()
{
    $data = [
        "requested" => Input::old("requested")
    ];

    if (Input::server("REQUEST_METHOD") == "POST")
    {
        $validator = Validator::make(Input::all(), [
            "email" => "required"
        ]);

        if ($validator->passes())
        {
            $credentials = [
                "email" => Input::get("email")
            ];

            Password::remind($credentials,
                function($message, $user)
                {
                    $message->from("chris@example.com");
                }
            );

            $data["requested"] = true;

            return Redirect::route("user/request")
                ->withInput($data);
        }
    }

    return View::make("user/request", $data);
}

public function resetAction()
{
    $token = "?token=" . Input::get("token");

    $errors = new MessageBag();

    if ($old = Input::old("errors"))
    {
        $errors = $old;
    }

    $data = [
        "token"  => $token,
        "errors" => $errors
    ];

    if (Input::server("REQUEST_METHOD") == "POST")
    {
        $validator = Validator::make(Input::all(), [
            "email"                 => "required|email",
            "password"              => "required|min:6",
            "password_confirmation" => "same:password",
            "token"                 => "exists:token,token"
        ]);

        if ($validator->passes())
        {
            $credentials = [
                "email" => Input::get("email")
            ];

            Password::reset($credentials,
                function($user, $password)
                {
                    $user->password = Hash::make($password);
                    $user->save();

                    Auth::login($user);

                    return Redirect::route("user/profile");
                }
            );
        }

        $data["email"] = Input::get("email");
        $data["errors"] = $validator->errors();

        return Redirect::to(URL::route("user/reset") . $token)
            ->withInput($data);
    }

    return View::make("user/reset", $data);
}

public function logoutAction()
{
    Auth::logout();
    return Redirect::route("user/login");
}


}


