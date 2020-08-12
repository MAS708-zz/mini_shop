@extends('layouts.layout')

@section('subtitle', 'See Our Product Customer')

@section('breadcrumb')
    @parent
    <a href="/">Home</a><a href="{{url('/productCategories')}}">/Product</a>
@endsection

@section('container')

    <div class="col position-static mt-3">
        <table class="table table-bordered" cellpadding="10"  cellspacing="0">
                <thead>
                    <tr>
                        <th width="50px">No.</th>
                        <th width="200px">Name</th>
                        <th width="100px">Category</th>
                        <th width="100px">Price</th>
                        <th width="50px">Image</th>
                        <th width="180px">Action</th>
                    </tr>
                </thead>



                <?php $i = 1; ?>
                @foreach ($category as $p)
                    <tr>
                        <td> <?= $i; ?> </td>
                        <td> {{ $p->name }} </td>
                        <td> {{ $name_tag->name }} </td>
                        <td> Rp. {{ number_format($p->price, 2, ',', '.') }}</td>
                        <td> <img src="{{ asset($p->image) }}" class="img-thumbnail" alt="Responsive image" width="100px"> </td>
                        <td>
                            <a href ="/product/{{ $p->id }}" type="button" class="btn btn-success btn-sm">Detail</a>
                            <a href="/product/{{ $p->id }}/edit" type="button" class="btn btn-primary btn-sm">Edit</a>
                            <form action ="{{ route('product.destroy', $p->id)}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm  " onclick="return confirm('Sure?')" >Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php $i++; ?>
                @endforeach

        </table>

    </div>
@endsection
