<?php

namespace App\Http\Controllers;

use App\MemberCategory;
use Illuminate\Http\Request;

class memberCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = MemberCategory::all();
        return view('memberCategories.index', compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('memberCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate  ([
            'name' => 'required'
        ]);

        MemberCategory::create($request->all());
        return redirect('/memberCategories')->with('status', 'New Member Categories Created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($memberCategories)
    {
        $category = MemberCategory::find($memberCategories)->member;
        $name_tag = MemberCategory::find($memberCategories);

        return view('memberCategories.show', compact( 'category' ), compact( 'name_tag' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = MemberCategory::findOrFail($id);
        $find->delete();
        $find->member()->delete();
        return redirect('/memberCategories')->with('status', 'Member Categories has been deleted!');
    }
}
