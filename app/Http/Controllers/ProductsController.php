<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::paginate(7);
        return \view('products.index')
        -> with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return \view('products.form');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' =>'required|max:70|min:1',
            'price'=>'required',
            'SKU'=>'required|numeric',
            'quantity'=>'required',
            'category'=>'required|min:0|not_in:0'
        ]); 
        //echo "<pre>";
        
        //print_r($request->all());
        //die;
        
        $name=$request->input('name');
        $price=$request->input('price');
        $code=$request->input('SKU');
        $quantity=$request->input('quantity');
        $categoryaux=$request->input('category');
        $category = ($categoryaux==1) ? 'Vegetales' : 'Frutas';
        $imageaux=$request->input('image');
        $image = ($imageaux==null) ? '../noimage.jpg':$imageaux;
        $seaonalaux=$request->input('is_seasonal');
        $seasonal = ($seaonalaux=='on') ? true : false;
        
        
        $request->replace([
            'name'=>$name,
            'price'=>$price,
            'SKU'=>$code,
            'quantity'=>$quantity,
            'category'=>$category,
            'image'=>$image,
            'is_seasonal'=>$seasonal,
        ]);

        
        $products = Products::create($request->only('name','price','SKU','is_seasonal','image','quantity','category'));
        
        Session::flash('Mensaje', 'Producto Agregado con exito!!');
        return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        return \view('products.form')
                        ->with('products',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        
        $request->validate([
            'name' =>'required|max:70|min:1',
            'price'=>'required',
            'SKU'=>'required|numeric',
            'quantity'=>'required',
            'category'=>'required|min:0|not_in:0'
        ]); 
        //echo "<pre>";
        
        //print_r($request->all());
        //die;
        
        $name=$request->input('name');
        $price=$request->input('price');
        $code=$request->input('SKU');
        $quantity=$request->input('quantity');
        $categoryaux=$request->input('category');
        $category = ($categoryaux==1) ? 'Vegetales' : 'Frutas';
        $imageaux=$request->input('image');
        $image = ($imageaux==null) ? '../noimage.jpg':$imageaux;
        $seaonalaux=$request->input('is_seasonal');
        $seasonal = ($seaonalaux=='on') ? true : false;
        
        
        $request->replace([
            'name'=>$name,
            'price'=>$price,
            'SKU'=>$code,
            'quantity'=>$quantity,
            'category'=>$category,
            'image'=>$image,
            'is_seasonal'=>$seasonal,
        ]);

        
        //$products = Products::create($request->only('name','price','SKU','is_seasonal','image','quantity','category'));
        $products->name=$request['name'];
        $products->price=$request['price'];
        $products->SKU=$request['SKU'];
        $products->quantity=$request['quantity'];
        $products->category=$request['category'];
        $products->image=$request['image'];
        $products->is_seasonal=$request['is_seasonal'];
        $products->save();
        Session::flash('Mensaje', 'Producto Editado con exito!!');
        return redirect()->route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        
        $products->delete();
        Session::flash('Mensaje', 'Producto Eliminado con exito!!');
        return redirect()->route('products.index');
    }

}
