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
                    <ul class="list-group">
                        
                        @foreach( $products as $product )
                        <li class="list-group-item d-flex justify-content-between align-items-center">                        
                            {{ $product->name }}
                            <a href ="/product/{{ $product->id }}" class="badge badge-info">detail</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
@endsection
