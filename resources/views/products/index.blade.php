@extends('layouts.layout')

@section('subtitle', 'Your Product List, Admin')

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
        </div>

        <div class="col position-static mt-3">
            <table class="table table-bordered" cellpadding="10"  cellspacing="0">
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
                    <?php $i = 1;  ?>
                        @foreach( $products as $product )
                            <tr>
                                <td><?= $i; ?></td>
                                <td> {{ $product->name }} </td>
                                <td> {{ $product->category->name }} </td>
                                <td> {{ $product->price }} </td>
                                <td> <img src="{{ asset($product->image) }}" class="img-thumbnail" alt="Responsive image" width="100px"> </td>
                                <td> <a href ="/product/{{ $product->id }}" type="button" class="btn btn-success btn-sm">Detail</a>
                                        <a href="/product/{{ $product->id }}/edit" type="button" class="btn btn-primary btn-sm">Edit</a>
                                        <form action ="{{ route('product.destroy', $product->id)}}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm  " onclick="return confirm('Sure?')" >Delete</button>
                                        </form>
                                </td>
                            </tr>
                            <?php $i++;?>
                        @endforeach
            </table>
        </div>


@endsection
