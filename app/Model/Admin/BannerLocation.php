<?php namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes ;

class BannerLocation extends Model {

	use SoftDeletes;
	protected $table 		= 'banner_location';
	protected $dates 		= ['deleted_at'];
	protected $softDelete 	= true;
	protected $fillable 	= [
								'id', 
								'user_id', 
								'parent_id',
								'locaion_name',
								'sort_order',
								'liit',
								'size_display',
								'flag_last','type'
								];

	public function group_user()
	{
		// return $this->hasMany('App\Model\Admin\GroupUser','id','group_id');
	}
}