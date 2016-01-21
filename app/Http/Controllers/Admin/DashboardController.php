<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use View ;

class DashboardController extends Controller
{
	public function __construct()
	{
	}
	public function index()
	{
		return View::make('admin.dashboard.index') ;
	}
}