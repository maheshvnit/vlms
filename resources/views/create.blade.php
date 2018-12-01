@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Apply for leave</div>

                <div class="card-body">

                    	<form name="emp-aply" action="/employee/store" method="POST">
							@csrf
						  <div class="form-group">
							<label for="from_date">From Date</label>
							<input type="text" class="form-control" id="from_date" name="from_date" placeholder="From Date" value="{{old('from_date')}}">
						  </div>
						  <div class="form-group">
							<label for="to_date">To Date</label>
							<input type="text" class="form-control" id="to_date" name="to_date" placeholder="To Date" value="{{old('to_date')}}">
						  </div>

						  <div class="form-group">
							<label for="reason">Reason for leave</label>
							<textarea class="form-control" id="reason" name="reason" rows="3" placeholder="Reason for leave">{{old('reason')}}</textarea>
						  </div>
						  <div class="form-group">
							<label for="backup_user_id">Backup Employee</label>
							<select class="form-control" id="backup_user_id" name="backup_user_id">
									<?php $id = Auth::id();?>
									@foreach(App\User::all() as $employee)
										<?php //print_r($tag); ?> 
											@if($id != $employee->id && $employee->role && $employee->role->name != 'admin')
											<option value="{{$employee->id}}">{{$employee->name}}</option>
											@endif													   
								   @endforeach
							</select>
						  </div>	
							<div class="form-group">
							<button type="submit" class="btn btn-primary">Apply</button>
							</div>
						</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
