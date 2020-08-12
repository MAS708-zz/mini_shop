@extends('layouts.layout')

@section('subtitle', 'Add Products')

@section('breadcrumb')
    @parent
        <a href="/">Home</a><a href="/member">/Member</a>
@endsection

@section('container')
<div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-3">Add New Member</h1>

                <form method="POST" action="{{Route('member.store')}}" enctype="multipart/form-data">
                @csrf

                    <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="fullname" placeholder="Insert Full Name" name="full_name" value="{{old('full_name')}}">
                        @error('full_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>


                     <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{old('dob')}}">
                        @error('dob')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Insert Address" name="address" value="{{old('address')}}">
                        @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <label for="gender">Gender :</label>
                    <select class="form-control mb-3" name="gender" id="gender">

                        <option value="" selected>--Choose Gender--</option>
                        <option value="wanita">Wanita</option>
                        <option value="pria" >Pria</option>

                    </select>

                    <label for="category">Member Category</label>
                   <select name="member_category_id" class="form-control form-control-sm" id="category">
                        <option value="">--Select Category Member--</option>

                        @foreach ($category as $c)
                            <option id="{{ $c->id }}" name = "{{ $c->id }}" value = "{{ $c->id }}"
                                @if ($c->id == old('member_category_id', $c->id))

                                @endif
                            >{{ $c->name  }}</option>
                        @endforeach
                        @error('product_category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </select>

                    <button type="submit" class="btn btn-primary my-3">Create</button>
                </form>

            </div>
        </div>
    </div>
@endsection
