@extends('layouts.layout')

@section('subtitle', 'Welcome to Product Categories, Admin')

@section('breadcrumb')
    @parent
    <a href="{{url('/')}}">Home</a><a href="{{url('/productCategories')}}">/Product</a>
@endsection

@section('container')
    <div class="container">
            <div class="row">
                <div class="col-6">
                        <h1 class="mt-3">Categories List</h1>

                </div>
            </div>
    </div>
        <div class="col position-static mt-3">
            <table class="table table-bordered" cellpadding="10"  cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
            </thead>

            <?php $i = 1; ?>
            @foreach( $product_categories as $prod )
                <tr>
                    <td> <?= $i; ?> </td>
                    <td> {{ $prod->name }} </td>
                    <td><form action ="{{ route('productCategories.destroy', $prod->id)}}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm float-right ml-2" onclick="return confirm('Sure ?')">Delete</button>
                        </form>
                        <a href ="{{url('/productCategories')}}/{{ $prod->id}}/edit" type="submit" class="btn btn-success btn-sm float-right ml-2">Edit Product Category</a>
                        <a href ="{{url('/productCategories')}}/{{ $prod->id }}" class="btn btn-primary btn-sm float-right ml-2">Show Product</a>
                    </td>
                </tr>
                <?php $i++; ?>
            @endforeach
            </table>
        </div>


@endsection


