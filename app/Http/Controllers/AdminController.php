<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth:admin');
        $this->middleware('auth');
        $this->middleware('role');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //get products
        $products = Product::orderBy('name', 'ASC')->paginate(9);
        return view('admin', compact('products'));
    }
}
