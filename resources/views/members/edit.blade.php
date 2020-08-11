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

                <form method="POST" action="/product/{{ $product->id }}" enctype="multipart/form-data">
                @method('patch')
                @csrf

                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama" name="name" value="{{ $member->name }}">
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="fullname" placeholder="Insert Full Name" name="full_name" value="{{ $member->full_name }}">
                    @error('full_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                 <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ $member->dob }}">
                    @error('dob')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Insert Address" name="address" value="{{ $member->address }}">
                    @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

               <select name="member_category_id" class="form-control form-control-sm">
                    <option value="">--Select Category Member--</option>

                    @foreach ($member_category as $c)
                        <option id="{{ $c->id }}" name = "{{ $c->id }}" value = "{{ $c->id }}"
                            @if ($c->id == old('member_category_id', $c->id))

                            @endif
                        >{{ $c->name  }}</option>
                    @endforeach
                    @error('product_category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </select>

                    <button type="submit" class="btn btn-primary">Edit Data!</button>
                </form>

                </div>
            </div>
        </div>

@endsection
