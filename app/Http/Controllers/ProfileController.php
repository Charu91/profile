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
		
		
		if(Input::hasFile('file'))
		{
			echo "Uploaded";
			$file=Input::file('file');
			$file->move('uploads',$file->getClientOriginalName());
			echo'<img class="img-rounded" src= "Uploads/'. $file->getClientOriginalName() . '" style="width:200px;height:200px;"/>';
		}
    }
}
