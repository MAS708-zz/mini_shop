<?php

namespace App\Http\Controllers;

use App\Member;
use App\Product;
use App\transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class transactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = transactions::all();
        return view('transactions.index', compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tra_id = transactions::all();
        $prod_id = Product::all();
        $mem_id = Member::all();
        $prod_tr = transactions::with('product')->get();
        $mem_tr = transactions::with('member')->get();

        return view('products.create', compact('prod_tr', 'mem_tr', 'mem_id', 'prod_id', 'tra_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $current = Carbon::now();
        $expl = explode(['-',' ', ':'], $current);
        $imp = implode($expl);

        $input = $request->all();
        $input['trx_number'] = $imp . rand(100,999) ;

        $this->validate  ($request, [
            'trx_number' => 'required|string',
            'member_id' => 'required|numeric',
            'product_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'total' => 'required|numeric'
            ]);



        transactions::create($input);
        return redirect('/transaction')->with('status', 'New Transactions has been Created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('transactions.index', compact('$id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tra_id = transactions::all();
        $prod_id = Product::all();
        $mem_id = Member::all();
        $prod_tr = transactions::with('product')->get();
        $mem_tr = transactions::with('member')->get();

        return view('transactions.edit', compact('prod_tr', 'mem_tr', 'mem_id', 'prod_id', 'tra_id', 'id'));
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
            'member_id' => 'required|numeric',
            'product_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'total' => 'required|numeric'
            ]);

        $tr = transactions::findOrFail($id);

        $tr->update($request->all());
        return redirect('/transaction')->with('status', 'Transaction has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        transactions::destroy($id);
        return redirect('/transaction')->with('status', 'Transaction has been deleted!');
    }
}
