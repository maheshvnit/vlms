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


        $inputs = $request->all();
		
		$user_id = Auth::user()->id;
		$crrDate = date("Y-m-d H:i:s");
		$inputs['user_id'] = $user_id;
		$inputs['created_at'] = $crrDate;
		$inputs['updated_at'] = $crrDate;
		
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
		
		
		if($stored && is_array($stored))
		{
			return redirect()->back()->withErrors($stored)->withInput();
		}
		else
		{
			return route('home');
		}
		
    }	
}
