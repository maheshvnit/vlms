<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class LeaveEmployee extends Model
{
	/*

		Full texts	
		id
		from_date
		to_date
		reason
		user_id
		backup_user_id
		created_at
		updated_at
		deleted_at	
	*/
    protected $fillable = [
        'from_date', 'to_date', 'reason','user_id','backup_user_id','created_at','updated_at'
    ];     
}
