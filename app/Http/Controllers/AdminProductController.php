<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Price;
use App\Sale;


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
        $product->likes = 0;
        
        $product->save();

        $price = new Price();
        $price->product_id = $product->id;
        $price->price = $request->price;
        $price->save();

        return redirect()->back();

    }
    public function removeProduct( Request $request )
    {

        $product = Product::findOrFail($request->snack_id);
        
        if($product->delete())
        {
            return redirect()->back();    
        }       

    }

    public function changePriceProduct( Request $request )
    {
        //dd($request->all());
        $product = Product::findOrFail($request->snack_id);
        $product->price = $request->price;

        $price = new Price();
        $price->product_id = $request->snack_id;
        $price->price = $request->price;

        if($product->save() && $price->save())
        {
            return redirect()->back();
        }        

    }

    public function changeAmountProduct( Request $request )
    {
        
        $product = Product::findOrFail($request->snack_id);
        $product->amount = $request->amount;
        if($product->save()){
            return redirect()->back();
        }

    }

    public function priceLog( $id )
    {
        $snack = Product::findOrFail($id);
        $prices = Price::findOrFail($id)->paginate(9);
        return view('snacks.prices', compact('prices','snack'));

    }

    public function salesLog( $id )
    {
        $snack = Product::findOrFail($id);
        $sales = Sale::findOrFail($id)->paginate(9);
        //dd($sales);
        return view('snacks.sales', compact('sales','snack'));
    }
}
