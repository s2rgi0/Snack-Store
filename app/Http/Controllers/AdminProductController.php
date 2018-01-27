<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class AdminProductController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function addProduct( Request $request )
    {
    	//dd($request->all());
    	$product = new Product;
    	$product->name = $request->name;
    	$product->price = $request->price;
    	$product->amount = $request->amount;
		$product->save();


    	return redirect()->back();

    }
}
