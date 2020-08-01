@extends('layouts.layout')

@section('subtitle', 'See Our Product Customer')

@section('breadcrumb')
    @parent
    <a href="{{url('/')}}">Home</a><a href="{{url('/productCategories')}}">/Product</a>
@endsection

@section('container')
    <div class="container">
            <div class="row">
                <div class="col-6">
                        <h1 class="mt-3">Categories List</h1>

                <a href="{{url('/productCategories/create')}}" class="btn btn-primary my-3">Add New Categories</a>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                    <ul class="list-group">

                        @foreach( $product_categories as $prod )
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $prod->name }}
                            <a href ="{{url('/productCategories')}}/{{ $prod->id }}" class="badge badge-info">Show Product</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
@endsection
