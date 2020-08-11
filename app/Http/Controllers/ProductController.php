<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use File;
use Image;

class ProductController extends Controller
{

    public function index()
    {
        //return Product
        $products=Product::all();
        return view('products.index', compact ('products'));
    }

    public function create()
    {
        $prod_cat_id = Product::all();
        $product = Product::with('category')->get();
        $cat = Categories::all();
        return view('products.create', compact('product'), compact('cat'), compact('prod_cat_id'));
    }

    public function store(Request $request)
    {
        //

        $this->validate  ($request, [
            'name' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'desc' => 'nullable',
            'product_category_id' => 'required',
            ]);

            $input = $request->all();
            $input['image'] = null;

            if ($request->hasFile('image')){
                $input['image'] = 'images/'.rand().'.'.$request->image->getClientOriginalExtension();
                $destinationPath = public_path('/');
                $img = Image::make($request->image->getRealPath());
                $img->resize(200, 200, function ($constraint) {
                })->save($destinationPath.'/'.$input['image']);
            }

            Product::create($input);
            return redirect('/product')->with('status', 'New Product Created !');
        }

    public function show($product)
    {
        //Show Products
        $products = Product::find($product);
        return view('products.show', compact('products'));
    }

    public function edit(Product $product)
    {
        //Edit Product
        $cat = Categories::all();
        return view('products.edit', compact('product', 'cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Update for New Config
        $this->validate  ($request ,[
            'name' => 'required',
            'price' => 'required|numeric',
            'desc' => 'nullable',
            'product_category_id' => 'required',
        ]);

        $input = $request->all();
        $product = Product::findOrFail($id);

        $input['image'] = $product->image;

        if ($request->hasFile('image')){
            if (!$product->image == NULL){
                unlink(public_path($product->image));
            }
            $input['image'] = 'images/'.rand().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/'), $input['image']);
        }

        $product->update($input);
        return redirect('/product/'.$product->id)->with('status', 'Product has been Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if (!$product->image == NULL){
            unlink(public_path($product->image));
        }

        Product::destroy($id);
        return redirect('/product')->with('status', 'Product has been deleted!');
    }


}
