<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes ;

class GroupUser extends Model {

	use SoftDeletes;

	protected $table 		= 'group_user';
	protected $dates 		= ['deleted_at'];
	protected $softDelete 	= true;
	protected $fillable 	= ['group_name', 'sort_order', 'status'] ;

}