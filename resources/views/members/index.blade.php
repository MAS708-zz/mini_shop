@extends('layouts.layout')

@section('subtitle', 'See Our Product Customer')

@section('breadcrumb')
    @parent
    <a href="/">Home</a><a href="/member">/Member</a>
@endsection

@section('container')
    <div class="container">
            <div class="row">
                <div class="col-6">
                        <h1 class="mt-3">Member List</h1>

                        <a href="/member/create" class="btn btn-primary my-3">Add New Member</a>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif



                </div>
            </div>
    </div>

            <div class="col position-static mt-3">
                <table class="table table-sm table-bordered" cellpadding="10"  cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Date of Birth</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">gender</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>



                    <?php $i = 1; ?>
                    @foreach( $member as $m )
                        <tr>
                            <td> <?= $i; ?> </td>
                            <td> {{ $m->full_name }} </td>
                            <td> {{ $m->category->name }} </td>
                            <td> {{ $m->dob }} </td>
                            <td> {{ $m->address }} </td>
                            <td> {{ $m->gender }} </td>
                            <td>
                                <a href="/member/{{ $m->id }}/edit" type="button" class="btn btn-primary btn-sm">Edit</a>
                                <form action ="{{ route('member.destroy', $m->id)}}" method="post" class="d-inline">
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
