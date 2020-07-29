<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use File;

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
        // $category = Product::all();
        // ,compact('category')
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

        $this->validate  ($request, [
            'name' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'desc' => 'nullable'
            // 'product_category_id' => 'required',
            ]);

            $input = $request->all();
            $input['image'] = null;
    
            if ($request->hasFile('image')){
                $input['image'] = 'images/'.str_slug($input['name'], '-').'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('images/'), $input['image']);
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
        $product = Product::findOrFail($id);

        $input['image'] = $product->image;

        if ($request->hasFile('image')){
            if (!$product->image == NULL){
                unlink(public_path($product->image));
            }
            $input['image'] = 'images/'.str_slug($input['name'], '-').'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/'), $input['image']);  
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
