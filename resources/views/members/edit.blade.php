@extends('layouts.layout')
@section('subtitle', 'Edit Product')
@section('breadcrumb')
    @parent
    <a href="/">Home</a><a href="/member">/Product</a>
@endsection
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-3">Form Edit product</h1>

                <form method="POST" action="/member/{{ $member->id }}" enctype="multipart/form-data">
                @method('patch')
                @csrf

                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" placeholder="Insert Full Name" name="full_name" value="{{ $member->full_name }}">
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

                <label for="gender">Gender</label>
                <select class="form-control mb-3" name="gender" id="gender">

                    @if($member->gender == "pria")
                        <option value="pria" selected>Pria</option>
                        <option value="wanita">Wanita</option>
                    @elseif($member->gender == "wanita")
                    <option value="pria">Pria</option>
                    <option value="wanita" selected>Wanita</option>
                    @endif

                </select>

               <select name="member_category_id" class="form-control form-control-sm mb-3">
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
