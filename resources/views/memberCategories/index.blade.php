@extends('layouts.layout')

@section('subtitle', 'See Our Product Customer')

@section('breadcrumb')
    @parent
    <a href="{{url('/')}}">Home</a><a href="{{url('/memberCategories')}}">/Member Categories</a>
@endsection

@section('container')
        <div class="container">
            <div class="row">
                <div class="col-6">
                        <h1 class="mt-3">Categories List</h1>

                            <a href="{{url('/memberCategories/create')}}" class="btn btn-primary my-3">Add New Categories</a>
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
                                        <th scope="col">No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                            </thead>

                            <?php $i = 1; ?>
                            @foreach( $member as $m )
                                <tr>
                                    <td> <?= $i; ?> </td>
                                    <td> {{ $m->name }} </td>
                                    <td><form action ="{{ route('memberCategories.destroy', $m->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm float-right ml-2" onclick="return confirm('Sure ?')">Delete</button>
                                        </form>
                                        <a href ="{{url('/memberCategories')}}/{{ $m->id }}" class="btn btn-primary btn-sm float-right ml-2">Show Member</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach
                            </table>
                        </div>
@endsection


