@extends('layouts.layout')

@section('subtitle', 'Add Products')

@section('breadcrumb')
    @parent
        <a href="/">Home</a><a href="/productCategories">/Product</a>
@endsection

@section('container')
<div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-3">Add New Categories</h1>

                <form method="POST" action="{{Route('productCategories.store')}}" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama" name="name" value="{{old('name')}}">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

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
