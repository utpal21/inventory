<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


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
		//dd($request->all());
		return view('product.group');
	}
}
