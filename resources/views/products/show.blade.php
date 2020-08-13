@extends('layouts.layout')

@section('subtitle', 'See Our Product Customer')

@section('breadcrumb')
    @parent
    <a href="/">Home</a><a href="/product">/Product</a>
@endsection

@section('container')

        <div class="container mt-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3>Detail Product</h3>

                            <a href ="/product" type="button" class="btn btn-success btn-sm mb-3">Back</a>

                            <table class="table table-bordered">
                                        <tr><td>
                                            <div class="col-md-12">
                                                Product Name : {{ $products->name }}
                                            </div>
                                        </td></tr>

                                        <tr><td>
                                            <div class="col-md-12">
                                                Price : Rp. {{ number_format($products->price, 2, ',', '.') }}
                                            </div>
                                        </td></tr>

                                        <tr><td>
                                            <div class="col-md-12">
                                                Category : {{ $products->category->name }}
                                            </div>
                                        </td></tr>

                                        <tr><td>
                                            <div class="col-md-12">
                                                Desc : {{ $products->desc }}
                                            </div>
                                        </td></tr>

                                </table>
                    </div>
                </div>
            </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mt-4">
                                <div class="text-center">
                                <img src="{{asset( $products->image )}}" class="img-thumbnail" width="200px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

