@extends('layouts.layout')

@section('subtitle', 'Add Products')

@section('breadcrumb')
    @parent
        <a href="/">Home</a><a href="/product">/Product</a>
@endsection

@section('container')
<div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-3">Add New Product</h1>

                <form method="POST" action="{{Route('product.store')}}" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama" name="name" value="{{old('name')}}">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                     <div class="form-group">
                        <label for="price">price</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Masukkan harga" name="price" value="{{old('price')}}">
                        @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Add Product Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                   <select name="product_category_id" class="form-control form-control-sm">
                        <option value="">--Select Category--</option>

                        @foreach ($cat as $c)
                            <option id="{{ $c->id }}" name = "{{ $c->id }}" value = "{{ $c->id }}"
                                @if ($c->id == old('product_category_id', $c->id))

                                @endif
                            >{{ $c->name  }}</option>
                        @endforeach
                        @error('product_category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </select>

                    {{-- @foreach ($cat as $c)

                            {{ $c->name }}

                    @endforeach --}}

                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea class="form-control" id="desc" name="desc" rows="3" value="{{old('desc')}}"></textarea>
                        @error('desc')<div class="invalid-feedback">{{ $desc }}</div>@enderror
                    </div>


                    <button type="submit" class="btn btn-primary my-3">Create</button>
                </form>

            </div>
        </div>
    </div>
@endsection
