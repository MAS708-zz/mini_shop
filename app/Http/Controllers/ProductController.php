<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
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

        $request->validate  ([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'desc' => 'nullable'
            // 'product_category_id' => 'required',
            ]);

                $file = $request->file('image');
                $new_name =  rand() . '.' .  $file->getClientOriginalExtension();
                $direction = $file->move('images', $new_name);

            $form_data = array(
                'name' => $request ->name,
                'price' => $request ->price,
                'image' => $direction,
                'desc' => $request ->desc,
                // 'product_category_id' => $request->product_category_id,
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'desc' => 'nullable'

            ]);

            // if (isset($product['image'])) {
            //     $file = $request->file('image');
            //     $name = rand() . '.' .  $file->getClientOriginalExtension();
            //     $file->move('images', $name);

            //         if (file_exists($name =rand() . '.' .  $file->getClientOriginalExtension()))
            //         {
            //             unlink(public_path($name));
            //         };
            //         //Update Image
            //     $product->image = $name;
            // }



            if(isset($product['image']))
            {

                $file = $request->file('image');
                $new_name =  rand() . '.' .  $file->getClientOriginalExtension();
                $direction = $file->move('images', $new_name);


                    if(file_exists($product->image = $direction)){
                            $gambar = Product::where('id',$product->id)->first();
                            File::delete($gambar->image);
                        }
                        $product->image = $direction;
            }

        Product::where('id', $product->id)
                        ->update([
                            'name' => $request->name,
                            'price' => $request->price,
                            'desc' => $request->desc
                        ]);

        return redirect('/product/'.$product->id)->with('status', 'Product has been Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $gambar = Product::where('id',$product->id)->first();
        File::delete($gambar->image);

        //delete product
        Product::destroy($product->id);
        return redirect('/product')->with('status', 'Product has been deleted!');
    }
}
