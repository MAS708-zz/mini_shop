<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Product;

class productCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_categories = Categories::all();
        return view('productsCategories.index', compact('product_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productsCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name'   => 'required',
            'desc' => 'nullable'
         ]);

        Categories::create($request->all());
        return redirect('/productCategories')->with('status', 'New Product Categories Created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($productCategory)
    {
        $category = Categories::find($productCategory)->product;
        $name_tag = Categories::find($productCategory);

        return view('productsCategories.show', compact( 'category' ), compact( 'name_tag' ));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $productCategory)
    {
        return view('productsCategories.edit', compact('productCategory'));
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

        $this->validate($request, [
            'name'   => 'required',
            'desc' => 'nullable',
         ]);

        $productCategory = Categories::findOrFail($id);

        $productCategory->update($request->all());
        return redirect('/productCategories')->with('status', 'Product Categories has been Edited !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = Categories::findOrFail($id);

            if (!$find->product()->image == NULL){
                unlink(public_path($find->product()->image));
            }

        $find->delete();
        $find->product()->delete();

        return redirect('/productCategories')->with('status', 'Product has been deleted!');
    }
}
