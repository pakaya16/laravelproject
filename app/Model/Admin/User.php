<?php namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes ;

class User extends Model {

	use SoftDeletes;
	protected $table = 'user';
	protected $hidden = ['password'];
	protected $dates = ['deleted_at'];
	protected $softDelete = true;
	protected $fillable = array('group_id', 'username', 'password','first_name','last_name','position','department','status');

	public function group_user()
	{
		// return $this->hasMany('App\Model\Admin\GroupUser','id','group_id');
		return $this->belongsTo('App\Model\Admin\GroupUser', 'group_id');
	}
}