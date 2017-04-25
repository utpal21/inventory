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
}
