@extends('layouts.layout')

@section('subtitle', 'Transaction - Shopping Cart')

@section('breadcrumb')
    @parent
    <a href="/">Home</a><a href="/transaction">/Transaction</a>
@endsection

@section('container')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3>Detail Transaksi</h3>
                    <a href ="/transaction" type="button" class="btn btn-success btn-sm mb-3">Back</a>
                    <table class="table table-bordered">
                                <tr><td>
                                    <div class="col-md-12">
                                        Member : {{ $transaction->member[0]['full_name'] }}
                                    </div>
                                </td></tr>

                                <tr><td>
                                    <div class="col-md-12">
                                        Product : {{ $transaction->product[0]['name'] }}
                                    </div>
                                </td></tr>

                                <tr><td>
                                    <div class="col-md-12">
                                        Quantity : {{ $transaction->quantity }}
                                    </div>
                                </td></tr>

                                <tr><td>
                                    <div class="col-md-12">
                                        Discount : {{ $transaction->discount }}%
                                    </div>
                                </td></tr>

                                <tr><td>
                                    <div class="col-md-12">
                                        Total : Rp. {{ number_format($transaction->total, 2, ',', '.') }}
                                    </div>
                                </td></tr>




                        </table>
            </div>
        </div>
    </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="mt-1">
                        Time : {{ $transaction->created_at }}
                    </div>
                </div>
                <div class="card-body">
                    <div class="mt-4">
                        <div class="text-center">
                        <img src="{{asset( $transaction->product[0]['image'] )}}" class="img-thumbnail" width="200px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

