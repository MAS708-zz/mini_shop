@extends('layouts.layout')

@section('subtitle', 'Add Products')

@section('breadcrumb')
    @parent
        <a href="/">Home</a><a href="/memberCategories">/Member Categories</a>
@endsection

@section('container')
<div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-3">Add New Categories</h1>

                <form method="POST" action="{{Route('memberCategories.store')}}" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama" name="name" value="{{old('name')}}">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <button type="submit" class="btn btn-primary my-3" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">Create</button>
                </form>

            </div>
        </div>
    </div>
@endsection
