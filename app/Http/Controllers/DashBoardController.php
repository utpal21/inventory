<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashBoardController extends Controller
{
	/*Load DashBoard Layout*/
    public function index(){

		return view('dashboard.index');
	}
}
