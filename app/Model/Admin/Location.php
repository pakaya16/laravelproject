<?php namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes ;
use App\Model\Admin\User;

class Location extends Model {

	use SoftDeletes;
	protected $table 		= 'banner_location';
	protected $dates 		= ['deleted_at'];
	protected $softDelete 	= true;
	protected $fillable 	= [
								'id', 
								'user_id', 
								'parent_id',
								'location_name',
								'sort_order',
								'limit',
								'size_display',
								'flag_last',
								'type',
								'status'
								];

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}
}