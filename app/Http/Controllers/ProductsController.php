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
	public function product_label(){
    $data = DB::select('CALL 	inv_p_product_label(?,?)',['','']);
		return view('product.label')->with('data', $data);
	}
	/*Save Product Group*/
	public function store_product_label(Request $request){
    $name = $request->input('name');
    $active = $request->input('isset');
    $cr_by = 'utpal';
    $data = DB::select('CALL inv_iu_product_label(?,?,?,?)',['',$name, $active,$cr_by]);
		//dd($data);
		return view('product.label');
	}
}
