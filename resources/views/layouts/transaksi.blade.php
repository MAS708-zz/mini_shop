@extends('layouts.layout')

@section('subtitle', 'See Our Product Customer')

@section('breadcrumb')
    @parent
    <a href="/">Home</a><a href="/product">/Product</a>
@endsection

@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3>Form Transaksi</h3>
                    <table class="table table-bordered">
                        <tr><td>
                            <div class="col-md-12">
                                <select name="" class="form-control form-control-sm">
                                    <option value="">Member</option>
                                </select>
                            </div>
                        </td></tr>
                        <tr><td>
                            <div class="col-md-12">
                                <select name="" class="form-control form-control-sm">
                                    <option value="">Masukkan Product</option>
                                </select>
                            </div>
                        </td></tr>
                        <tr><td>
                            <div class="col-md-12">
                                <input type="text" placeholder="Quantity" class="form-control">
                            </div>
                        </td></tr>
                        <tr><td>
                            <div class="col-md-12">
                                <input type="text" placeholder="Discount" class="form-control">
                            </div>
                        </td></tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Total Transaksi : Rp.300.000</h3>
                </div>
                <div class="card-body">
                    <div class="mt-4">
                        <div class="text-center">
                            <img src="{{ asset('gambar/sihyeon.jpg')}}" class="img-thumbnail" width="200px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection