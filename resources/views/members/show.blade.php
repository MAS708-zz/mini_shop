@extends('layouts.layout')

@section('subtitle', 'See Our Product Customer')

@section('breadcrumb')
    @parent
    <a href="/">Home</a><a href="/member">/Member</a>
@endsection

@section('container')

    <div class="col-lg-4 col-md-12">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset($member->image) }}" class="img-thumbnail" alt="Responsive image">
                <div class="card-body">
                    <h5 class="card-title">{{$member->name}}</h5>
                    <p class="card-text">{{$member->full_name}}</p>
                    <p class="card-text">{{$member->dob}}</p>
                    <p class="card-text">{{$member->address}}</p>
                    <p class="card-text">{{$member->gender}}</p>
                    <p class="card-text">Category-{{$member->category->name}}</p>
                    <a href="{{ $member->id }}/edit" type="submit" class="btn btn-primary">Edit</a>
                    <form action ="{{ $member->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Sure?')" >Delete</button>
                    </form>
                    <a href ="/product"  class="d-inline">Back</a>
                </div>
        </div>
    </div>

@endsection

