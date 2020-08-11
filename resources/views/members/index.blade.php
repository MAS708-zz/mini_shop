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
                    <ul class="list-group">

                        @foreach( $member as $m )
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $m->full_name }}
                            <a href ="/member/{{ $m->id }}" class="badge badge-info">detail</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
@endsection
