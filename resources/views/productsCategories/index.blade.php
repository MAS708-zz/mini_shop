@extends('layouts.layout')

@section('subtitle', 'See Our Product Customer')

@section('breadcrumb')
    @parent
    <a href="{{url('/')}}">Home</a><a href="{{url('/productCategory')}}">/Product</a>
@endsection

@section('container')
    <div class="container">
            <div class="row">
                <div class="col-6">
                        <h1 class="mt-3">Categories List</h1>

                <a href="{{url('/productCategory/create')}}" class="btn btn-primary my-3">Add New Categories</a>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                    <ul class="list-group">
                        @foreach( $product_categories as $prod )
                        <li class="list-group-item">
                            {{ $prod->name }}
                            <form action ="{{ route('productCategory.destroy', $prod->id)}}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm float-right ml-2" onclick="return confirm('Yakin ?')">Delete</button>
                            </form>
                            <a href ="{{url('/productCategory')}}/{{ $prod->id }}" class="btn btn-primary btn-sm float-right ml-2">Show Product</a>
                            <a href ="{{url('/productCategory')}}/{{ $prod->id}}/edit" type="submit" class="btn btn-primary btn-sm float-right ml-2">Edit Product</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
@endsection


