<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LeaveEmployee;
use Illuminate\Support\Facades\Auth;
use DateTime;

class EmployeeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        return view('home');
    }

    public function create(Request $request) {
        return view('create');
    }

    public function store(Request $request) {
        $status = 0;

        $inputs = $request->all();

        $user_id = Auth::user()->id;
        $crrDate = date("Y-m-d H:i:s");
        $inputs['user_id'] = $user_id;
        $inputs['created_at'] = $crrDate;
        $inputs['updated_at'] = $crrDate;
        //from_date
        //to_date
        $from_date = DateTime::createFromFormat('d/m/Y', $inputs['from_date']);
        $to_date = DateTime::createFromFormat('d/m/Y', $inputs['to_date']);

        $inputs['from_date'] = $from_date->format('Y-m-d');
        $inputs['to_date'] = $to_date->format('Y-m-d');


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
        if ($stored) {
            $status = 1;
        }
        if ($status == 0) {
            return redirect()->back()->withErrors($stored)->withInput();
        } else {
            $request->session()->flash('status', 'Leave Applied Successfully!');
            return redirect()->route('home');
        }
    }

}
