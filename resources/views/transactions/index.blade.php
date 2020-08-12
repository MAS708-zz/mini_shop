@extends('layouts.layout')

@section('subtitle', 'Your Product List, Admin')

@section('breadcrumb')
    @parent
    <a href="/">Home</a><a href="/transaction">/Transaction</a>
@endsection

@section('container')

        <div class="container">
            <div class="row">
                <div class="col-6">
                        <h1 class="mt-3">Transaction List</h1>

                        <a href="/transaction/create" class="btn btn-primary my-3">Add Transaction</a>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                </div>
            </div>
        </div>

        <div class="col position-static mt-3">
            <table class="table table-bordered" cellpadding="10"  cellspacing="0">
                    <thead>
                        <tr>
                            <th width="50px">No.</th>
                            <th width="200px">Customer</th>
                            <th width="100px">Product</th>
                            <th width="100px">Quantity</th>
                            <th width="50px">Discount</th>
                            <th width="50px">Total</th>
                            <th width="180px">Action</th>
                        </tr>
                    </thead>
                    <?php $i = 1;  ?>
                        @foreach( $transaction as $tr )
                            <tr>
                                <td><?= $i; ?></td>
                                <td> {{ $tr->member->full_name }} </td>
                                <td> {{ $tr->product->name }} </td>
                                <td> {{ $tr->quantity }} </td>
                                <td> {{ $tr->discount }} </td>
                                <td> Rp. {{ number_format($tr->price, 2, ',', '.') }} </td>
                                <td> <img src="{{ asset($tr->image) }}" class="img-thumbnail" alt="Responsive image" width="100px"> </td>
                                <td>
                                        {{-- <a href ="/transaction/{{ $tr->id }}" type="button" class="btn btn-success btn-sm">Detail</a>
                                        <a href="/transaction/{{ $tr->id }}/edit" type="button" class="btn btn-primary btn-sm">Edit</a>
                                        <form action ="{{ route('transaction.destroy', $tr->id)}}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm  " onclick="return confirm('Sure?')" >Delete</button>
                                        </form> --}}
                                </td>
                            </tr>
                            <?php $i++;?>
                        @endforeach
            </table>
        </div>


@endsection
