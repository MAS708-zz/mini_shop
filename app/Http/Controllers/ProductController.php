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
        $product =Product::with('category')->get();
        $cat =Categories::all();
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
        //    $image = $request->file('image');
            $input['image'] = null;
    
            if ($request->hasFile('image')){
                $input['image'] = 'images/'.rand().'.'.$request->image->getClientOriginalExtension();
                $destinationPath = public_path('/');
                $img = Image::make($request->image->getRealPath());
                $img->resize(200, 200, function ($constraint) {
        //            $constraint->aspectRatio();
        //            $constraint->upsize();
                })->save($destinationPath.'/'.$input['image']);
        //        $new_name =  rand() . '.' .  $request->image->getClientOriginalExtension();
        //        $request->image->move('images', $new_name);
            }

        //        $file = $request->file('image');
        //        $new_name =  rand() . '.' .  $file->getClientOriginalExtension();
        //        $direction = $file->move('images', $new_name);

        //    $form_data = array(
        //        'name' => $request ->name,
        //        'price' => $request ->price,
        //        'image' => $direction,
        //        'desc' => $request ->desc,
                // 'product_category_id' => $request->product_category_id,
        //    );
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
        return view('products.edit', compact('product'));
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
        //
    //      $gambar = Product::where('id',$product->id)->first();
    //      File::delete($gambar->image);

        //Update for New Config
        $this->validate  ($request ,[
            'name' => 'required',
            'price' => 'required|numeric',
        //    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'desc' => 'nullable'

        ]);

        $input = $request->all();
    //    $image = $request->file('image');
        $product = Product::findOrFail($id);

        $input['image'] = $product->image;

        if ($request->hasFile('image')){
            if (!$product->image == NULL){
                unlink(public_path($product->image));
            }
            $input['image'] = 'images/'.rand().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/'), $input['image']);  
    //        $new_name =  rand() . '.' .  $request->image->getClientOriginalExtension();
    //        $request->image->move('images', $new_name);
        }

        $product->update($input);


    //    $file = $request->file('image');
    //    $new_name =  rand() . '.' .  $file->getClientOriginalExtension();
    //    $direction = $file->move('images', $new_name);

    //    Product::where('id', $product->id)
    //                    ->update([
    //                        'name' => $request->name,
    //                        'price' => $request->price,
    //                        'image' => $direction,
    //                        'desc' => $request->desc

    //                    ]);

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
        //
        //$gambar = Product::where('id',$product->id)->first();
        //File::delete($gambar->image);

        //delete product
        //Product::destroy($product->id);
        $product = Product::findOrFail($id);

        if (!$product->image == NULL){
            unlink(public_path($product->image));
        }

        Product::destroy($id);
        return redirect('/product')->with('status', 'Product has been deleted!');
    }

    
}
