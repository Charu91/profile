<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use Carbon;

class ProfileController extends Controller
{
/*	public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
	*/
	
	
	public function profile()
    {
        return view('upload');
	}
	
    public function upload(Request $request)
    {
		//if ($request->isMethod('post')) 
		//{
			$profile = new Profile;
			$arrRules = array(
							'first_name' 	=> 'required|max:255',
							'last_name'     => 'required|max:255',    
							'bio'   		=> 'required|max:255',
							'gender' 		=> 'required',
							'photo'    		=> 'required',
							);
			
			$data = $request->all();	
			$validator = Validator::make($data,$arrRules);
			if($validator->fails())
			{
				return Redirect::to('/upload')->withErrors($validator)->withInput();
			}
			
			 $first_name  	= (!isset($data['first_name'])) ? NULL : $data['first_name'];
			 $last_name     = (!isset($data['last_name'])) ? NULL : $data['last_name'];
			 $bio  			= (!isset($data['bio'])) ? NULL : $data['bio'];
			 $gender 		= (!isset($data['gender'])) ? NULL : $data['gender'];
			 $photo  		= (!isset($data['photo'])) ? NULL : $data['photo'];
							
			 
			 $profile->first_name = $request->first_name;
			 $profile->last_name = $request->last_name;
			 $profile->bio = $request->bio;
			 $profile->gender = $request->gender;
			 //$profile->photo = $request->photo;
			
			if($request->hasFile('photo')) 
			{
				echo "Uploaded";
				$file = Input::file('photo');
				//getting timestamp
				$timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
				
				$photo = $timestamp. '-' .$photo->getClientOriginalName();
				
				$profile->photo = $photo;

				$file->move(public_path().'/Uploads/', $photo);
				
				echo'<img class="img" src= "/Uploads/'. $file->getClientOriginalName() . '" style="width:200px;height:200px;"/>';				
			}		
			else
			{
				echo "Unable to upload image <br>";
			}

			$profile->save();
    }
	
	 public function showProfile(Request $request)
    {
        $profiles = Profile::all();
        return view('viewProfile', compact('profiles'));

    }
}
