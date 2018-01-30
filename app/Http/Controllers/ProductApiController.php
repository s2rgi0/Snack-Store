<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\Http\Resources\Product as ProductResource;


class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get Products
        $product = Product::paginate(9);
        //return the collection Articles as a resource
        return ProductResource::collection($product);

    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $product  = $request->isMethod('put') ? Product::findOrFail($request->product_id) : new Product;
        
        $product->id  = $request->input('product_id');
        $product->name  = $request->input('name');
        $product->price  = $request->input('price');
        $product->amount  = $request->input('amount');
        

        if($product->save()){
            return new ProductResource($product);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get product 
        $product = Product::findOrFail($id);
        //return article as resource
        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get product 
        $product = Product::findOrFail($id);
        //return article as resource
        if($product->delete()){
            return new ProductResource($product);    
        }
        
    }
}
