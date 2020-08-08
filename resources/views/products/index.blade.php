@extends('layouts.layout')

@section('subtitle', 'See Our Product Customer')

@section('breadcrumb')
    @parent
    <a href="/">Home</a><a href="/product">/Product</a>
@endsection

@section('container')
    <div class="container">
            <div class="row">
                <div class="col-6">
                        <h1 class="mt-3">Products List</h1>
                    
                        <a href="/product/create" class="btn btn-primary my-3">Add New Product</a> 
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                </div>
            </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="50px">No.</th>
                            <th width="200px">Name</th>
                            <th width="100px">Category</th>
                            <th width="100px">Price</th>
                            <th width="50px">Image</th>
                            <th width="180px">Action</th>
                        </tr>
                    </thead>
                        @foreach( $products as $product )
                            <tr>
                                <td>1.</td>
                                <td> {{ $product->name }} </td>
                                <td> {{ $product->category->name }} </td>
                                <td> {{ $product->price }} </td>
                                <td> <img src="{{ asset($product->image) }}" class="img-thumbnail" alt="Responsive image" width="100px"> </td>
                                <td> <a href ="/product/{{ $product->id }}" type="button" class="btn btn-success btn-sm">Detail</a>
                                        <a href="/edit" type="button" class="btn btn-primary btn-sm">Edit</a>
                                        <form action ="" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm  " onclick="return confirm('Sure?')" >Delete</button>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                </table>
 
    </div>
@endsection
