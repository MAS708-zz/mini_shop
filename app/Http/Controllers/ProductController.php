<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Product
        $products=Product::all();
        return view('products.index', compact ('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Create New Product
        return view('products.create');
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
        
        $request->validate  ([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'                 
            ]);    
            
            $file = $request->file('image');                              
            $new_name =  rand() . '.' .  $file->getClientOriginalExtension();
            $file->move(public_path('images'), $new_name);
            $form_data = array(
                'name' => $request ->name,
                'price' => $request ->price,
                'image' => $new_name,
            );                    
            Product::create($form_data);
            return redirect('/product')->with('status', 'New Product Created !');
            // Product::create($request->all());
        }
        
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //Show Products
        return view('products.show', compact('product'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //Edit Product
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //Update for New Config
        $request->validate  ([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        Product::where('id', $product->id)
                        ->update([
                            'name' => $request->name,
                            'price' => $request->price,                       
                            'image' => $request->image                       
                        ]);

        return redirect('/product')->with('status', 'Product has been Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //delete product    
        Product::destroy($product->id);
        return redirect('/product')->with('status', 'Product has been deleted!');
    }
}
