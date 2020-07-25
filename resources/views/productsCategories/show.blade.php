@extends('layouts.layout')

@section('subtitle', 'See Our Product Customer')

@section('breadcrumb')
    @parent
    <a href="/">Home</a><a href="{{url('/productCategories')}}">/Product</a>
@endsection

@section('container')

    <div class="col-lg-4 col-md-12">
        <div class="card" style="width: 18rem;">
            <img src="#" class="img-thumbnail" alt="Responsive image">
                <div class="card-body">
                    <h5 class="card-title">{{$product_categories->name}}</h5>
                    <a href="{{ $product_categories->id }}/edit" type="submit" class="btn btn-primary">Edit</a>
                    <form action ="{{ $product_categories->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger" >Delete</button>
                    </form>
                    <a href ="{{url('/productCategories')}}"  class="d-inline">Back</a>
                </div>
        </div>
    </div>

@endsection
