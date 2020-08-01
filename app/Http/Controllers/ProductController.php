<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Product;
use Illuminate\Http\Request;
use File;

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
        $product =Product::with('category')->get();
        $cat =Categories::all();
        return view('products.create', compact('product'), compact('cat'), compact('prod_cat_id'));
    }

    public function store(Request $request)
    {
        //

        $request->validate  ([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'desc' => 'nullable',
            'product_category_id' => 'required',
            ]);

                $file = $request->file('image');
                $new_name =  rand() . '.' .  $file->getClientOriginalExtension();
                $direction = $file->move('images', $new_name);

            $form_data = array(
                'name' => $request ->name,
                'price' => $request ->price,
                'image' => $direction,
                'desc' => $request ->desc,
                'product_category_id' => $request->product_category_id,
            );
            Product::create($form_data);
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
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate  ([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'oldimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'desc' => 'nullable'

        ]);

        // if($request->hasFile('image')){
        //     $file = $request->file('image');
        //     $new_name =  rand() . '.' .  $file->getClientOriginalExtension();
        //     $direction = $file->move('images', $new_name);


        //     $gambar = Product::where('id',$product->id)->first();
        //     File::delete($gambar->image);

        //     Product::where('id', $product->id)
        //     ->update([
        //         'image' => $direction,
        //     ]);
        // }
        Product::where('id', $product->id)
                        ->update([
                            'name' => $request->name,
                            'price' => $request->price,
                            'desc' => $request->desc,
                            'image' => $direction

                        ]);

        return redirect('/product/'.$product->id)->with('status', 'Product has been Edited!');
    }

    public function destroy(Product $product)
    {

        $gambar = Product::where('id',$product->id)->first();
        File::delete($gambar->image);

        //delete product
        Product::destroy($product->id);
        return redirect('/product')->with('status', 'Product has been deleted!');
    }
}
