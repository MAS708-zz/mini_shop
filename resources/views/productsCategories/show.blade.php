@extends('layouts.layout')

@section('subtitle', 'See Our Product Customer')

@section('breadcrumb')
    @parent
    <a href="/">Home</a><a href="{{url('/productCategory')}}">/Product</a>
@endsection

@section('container')

<div class="row position-relative">
    @foreach ($category as $item)
     <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset($item->image) }}" class="img-thumbnail" alt="Responsive image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">{{ $item->desc }}</p>
                        <p class="card-text">Category-{{ $name_tag->name }}</p>
                        <a href="{{url('/product/'.$item->id.'/edit')}}" type="submit" class="btn btn-primary">Edit</a>
                        <form action ="{{url('/product/'.$item->id)}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger" >Delete</button>
                        </form>
                        <a href ="/productCategory"  class="d-inline">Back</a>
                    </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
