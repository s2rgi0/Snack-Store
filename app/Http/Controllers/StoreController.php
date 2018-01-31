<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Like;
use App\Sale;

class StoreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('name', 'ASC')->paginate(9);
        return view('home', compact('products'));
    }

    public function like( Request $request )
    {   
        //dd($request->all());
        $like = new Like;
        $like->user_id = $request->user_id;
        $like->product_id = $request->snack_id;
        $like->save();
        
        $count = Like::where('product_id', $request->snack_id )->count();

        $snack = Product::findOrFail($request->snack_id);
        $snack->likes = $count; 
        $snack->save();

        return redirect()->back();


    }

    public function show( $id )
    {
        $snack = Product::findOrFail($id);

        return view('snacks.buy_snack' , compact('snack'));
    }

    public function buySnack( Request $req)
    {
        $snack = Product::findOrFail($req->snack_id);

        $qty = $snack->amount - $req->snack_qty;
        $snack->amount = $qty;

        $sale = new Sale;
        $sale->user_id = $req->user_id;
        $sale->product_id = $req->snack_id;
        $sale->amount = $req->snack_qty;

        if( $snack->save() && $sale->save()){
            $products = Product::paginate(9);
            return redirect('home');
        }         
    }

    public function searchSnack( Request $req )
    {
         
        if( $req->search_snack == null )
        {
            return redirect()->back();
        }else
        {
            $products = Product::where('name', 'LIKE', "%$req->search_snack%")->paginate(9);
            return view('home' , compact('products'));

        }
        
    }

    public function popularSnacks( )
    {
        $products = Product::orderBy('likes', 'DESC')->paginate(9);
        return view('home', compact('products'));   
    }

}
