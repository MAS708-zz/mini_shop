@extends('layouts.layout')

@section('subtitle', 'See Our Product Customer')

@section('breadcrumb')
    @parent
    <a href="/">Home</a><a href="{{url('/memberCategories')}}">/Product</a>
@endsection

@section('container')

    <div class="col position-static mt-3">
        <table class="table table-bordered" cellpadding="10"  cellspacing="0">
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
                @foreach ($category as $m)
                    <tr>
                        <td> <?= $i; ?> </td>
                        <td> {{ $m->full_name }} </td>
                        <td> {{ $name_tag->name }} </td>
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
