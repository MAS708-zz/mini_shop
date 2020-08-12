<?php

namespace App\Http\Controllers;


use App\Member;
use App\MemberCategory;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class memberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = Member::all();
        return view('members.index', compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member_all = Member::all();
        $member = Member::with('category')->get();
        $category = MemberCategory::all();
        return view('members.create', compact('member_all', 'category', 'member'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate  ($request, [
            'member_category_id' => 'required',
            'full_name' => 'required|string',
            'dob' => 'required',
            'address' => 'nullable',
            'gender' => 'in:pria,wanita'
            ]);

            //variable request all
            $input = $request->all();
            $exp = explode('-', $input['dob']);
            $imp = implode($exp);

            $input['barcode'] = $imp . rand(100,999) ;

            Member::create( $input );
            return redirect('/member')->with('status', 'New Member Created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($member)
    {
        return view('members.index', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $member_category = MemberCategory::all();
        return view('members.edit', compact('member'), compact('member_category'));
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
        $this->validate  ($request, [
            'member_category_id' => 'required',
            'full_name' => 'required|string',
            'dob' => 'required',
            'address' => 'nullable'
            ]);

        $member = Member::findOrFail($id);

        $member->update($request->all());
        return redirect('/member')->with('status', 'Member has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Member::destroy($id);
        return redirect('/member')->with('status', 'Member has been deleted!');

    }
}
