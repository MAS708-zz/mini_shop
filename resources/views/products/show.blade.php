@extends('layouts.layout')

@section('subtitle', 'See Our Product Customer')

@section('breadcrumb')
    @parent
    <a href="/">Home</a><a href="/product">/Product</a>
@endsection

@section('container')

    <div class="col-lg-4 col-md-12">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset($products->image) }}" class="img-thumbnail" alt="Responsive image">
                <div class="card-body">
                    <h5 class="card-title">{{$products->name}}</h5>
                    <p class="card-text">{{$products->price}}</p>
                    <p class="card-text">Category-{{$products->category->name}}</p>
                    <a href="{{ $products->id }}/edit" type="submit" class="btn btn-primary">Edit</a>
                    <form action ="{{ $products->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger" >Delete</button>
                    </form>
                    <a href ="/product"  class="d-inline">Back</a>
                </div>
        </div>
            <div class="card">
                    <div class="card-body">
                        <p class="card-text">{{ $products->desc }}</p>
                    </div>
            </div>
    </div>

@endsection

