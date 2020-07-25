@extends('layouts.layout')

@section('subtitle', 'See Our Product Customer')

@section('breadcrumb')
    @parent
    <a href="/">Home</a><a href="/product">/Product</a>
@endsection

@section('container')

    <div class="col-lg-4 col-md-12">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset($product->image) }}" class="img-thumbnail" alt="Responsive image">
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text">{{$product->price}}</p>
                    <p class="card-text">Category-####</p>
                    <a href="{{ $product->id }}/edit" type="submit" class="btn btn-primary">Edit</a>
                    <form action ="{{ $product->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger" >Delete</button>
                    </form>
                    <a href ="/product"  class="d-inline">Back</a>
                </div>
        </div>
            <div class="card">
                    <div class="card-body">
                        <p class="card-text">{{ $product->desc }}</p>
                    </div>
            </div>
    </div>

@endsection

    <!-- <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $product->name }}
            {{ $product->price }}
        </li>
    </ul> -->
    <!-- <a href="{{ $product->id }}/edit" type="submit" class="btn btn-primary" >Edit</a>
    <form action ="{{ $product->id }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger" >Delete</button>
    </form>
    <a href="/product" class="card-link">Back</a>        -->
