@extends('layouts.layout')
@section('subtitle', 'Edit Product Category')
@section('breadcrumb')
    @parent
    <a href="{{url('/')}}">Home</a><a href="{{url('/memberCategories')}}">/Product</a>
@endsection
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-3">Form Edit product category</h1>

                <form method="POST" action="/memberCategories/{{ $memberCategory->id }}" enctype="multipart/form-data">
                @method('patch')
                @csrf

                    <div class="form-group">
                        <label for="name">Member Category</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Insert New Member Category" name="name" value="{{ $memberCategory->name }}">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Edit Data!</button>
                </form>

                </div>
            </div>
        </div>

@endsection
