<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\LeaveEmployee;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('home');		
    }
	
	public function create(Request $request)
    {
        return view('create');		
    }
	
	public function store(Request $request)
    {
		$status = 0;

        $inputs = $request->all();
		
		$user_id = Auth::user()->id;
		$crrDate = date("Y-m-d H:i:s");
		$inputs['user_id'] = $user_id;
		$inputs['created_at'] = $crrDate;
		$inputs['updated_at'] = $crrDate;
		//from_date
		//to_date
		$inputs['from_date'] = date("Y-m-d", strtotime($inputs['from_date']));
		$inputs['to_date'] = date("Y-m-d", strtotime($inputs['to_date']));
		
		/*
			$date = DateTime::createFromFormat('j-M-Y', '15-Feb-2009');
			echo $date->format('Y-m-d');		
		*/
		
		/*
			from_date
			to_date
			reason
			user_id
			backup_user_id
			created_at
			updated_at
			deleted_at		
		*/
		
		$stored = LeaveEmployee::create($inputs);
		//dd($stored);
		if($stored)
		{
			$status = 1;
		}
		if($status == 0)
		{
			return redirect()->back()->withErrors($stored)->withInput();
		}
		else
		{
			return redirect()->route('home'); 
		}
		
    }	
}
