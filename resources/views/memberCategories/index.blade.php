@extends('layouts.layout')

@section('subtitle', 'See Our Product Customer')

@section('breadcrumb')
    @parent
    <a href="{{url('/')}}">Home</a><a href="{{url('/member')}}">/Member</a>
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
                    <ul class="list-group">
                        @foreach( $member as $m )
                        <li class="list-group-item">
                            {{ $m->name }}
                            <form action ="{{ route('memberCategories.destroy', $m->id)}}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm float-right ml-2" onclick="return confirm('Yakin ?')">Delete</button>
                            </form>
                            <a href ="{{url('/memberCategories')}}/{{ $m->id }}" class="btn btn-primary btn-sm float-right ml-2">Show Member</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
@endsection


