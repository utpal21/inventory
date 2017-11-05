<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductsController extends Controller
{
    public function index(){
	    return view('product.index');
    }
	/*Product Group*/
	public function product_group(){
		return view('product.group');
	}
	/*Save Product Group*/
	public function store_product_group(Request $request){
    $name = $request->input('name');
    $active = $request->input('isset');
    $date = '05/11/2017';
    //dd($name);
		$test = DB::select("CALL inv_p_product_label(?,?,?)",[$name,$active,$date]);
		dd($test);
		//return view('product.group');
	}
}
