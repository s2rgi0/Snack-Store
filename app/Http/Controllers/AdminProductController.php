<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
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
        $validator = Validator::make($request->all(), [
            'id_add'  => 'required|integer',
            'price_add'   => 'required|numeric|between:0,9999.99',
            'amount_add'   => 'required|integer',       
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();

        }else{

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
        $validator = Validator::make($request->all(), [

            'id_chg'  => 'required|integer',
            'price_chg'   => 'required|numeric|between:0,9999.99',      
        
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();

        }else{

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


               

    }

    public function changeAmountProduct( Request $request )
    {

        $validator = Validator::make($request->all(), [

            'id_amt'  => 'required|integer',
            'amount_amt'   => 'required|integer',      
        
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();

        }else{

            $product = Product::findOrFail($request->snack_id);
            $product->amount = $request->amount;

            if($product->save()){
                return redirect()->back();
            }

        }
        
        

    }

    public function priceLog( $id )
    {
        //dd($id);
        $snack = Product::findOrFail($id);
        $prices = Price::where('product_id',$id)->paginate(9);
        //dd($prices);
        return view('snacks.prices', compact('prices','snack'));

    }

    public function salesLog( $id )
    {
        $snack = Product::findOrFail($id);
        $sales = Sale::where('product_id',$id)->paginate(9);
        //dd($sales);
        $grl_sales = Sale::all();
        return view('snacks.sales', compact('sales','snack','grl_sales'));
    }
}
