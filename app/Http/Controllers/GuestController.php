<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Like;
use App\Sale;


class GuestController extends Controller
{
    //
	public function searchSnack( Request $req )
    {
         
        if( $req->search_snack == null )
        {
            return redirect()->back();
        }else
        {
            $products = Product::where('name', 'LIKE', "%$req->search_snack%")->paginate(9);
            return view('welcome' , compact('products'));

        }
        
    }

    public function popularSnacks( )
    {
        $products = Product::orderBy('likes', 'DESC')->paginate(9);
        return view('welcome', compact('products'));   
    }

}
