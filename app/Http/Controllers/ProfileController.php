<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function profile()
    {
        return view('profile');
    }
}
