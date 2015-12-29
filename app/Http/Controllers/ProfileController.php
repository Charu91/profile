<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Input;

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
	
    public function upload()
    {
		if ($request->isMethod('post')) 
		{
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
							
			 $Profile = new Profile;
			 $Profile->first_name = $request->first_name;
			 $Profile->last_name = $request->last_name;
			 $Profile->bio = $request->bio;
			 $Profile->gender = $request->gender;
			 $Profile->photo = $request->photo;
			
			 $Profile->save();
			 
		//	 return Redirect::to('/upload/');
		}
		
		
		if(Input::hasFile('file'))
		{
			echo "Uploaded";
			$file=Input::file('file');
			$file->move('uploads',$file->getClientOriginalName());
			echo'<img class="img-rounded" src= "Uploads/'. $file->getClientOriginalName() . '" style="width:200px;height:200px;"/>';
		}
    }
}
