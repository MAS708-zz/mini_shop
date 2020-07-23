@extends('layouts.layout')
@section('subtitle', 'Edit Product')
@section('breadcrumb')
    @parent
    <a href="/">Home</a><a href="/product">/Product</a>
@endsection
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-3">Form Edit product</h1>

                <form method="post" action="/products/{{ $product->id }}">
                @method('patch')
                @csrf

                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama" name="name" value="{{ $product->name }}">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>   
                    <div class="form-group">
                        <label for="price">price</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Masukkan Kelas" name="price" value="{{ $product->price }}">
                        @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>                        

                    <div class="form-group">
                        <label for="image">Add Product Image</label>
                        <input type="file" name="image" class="form-control-file" id="image">
                    </div>
                
                    <button type="submit" class="btn btn-primary">Edit Data!</button>
                </form>
                    
                </div>
            </div>
        </div>

@endsection