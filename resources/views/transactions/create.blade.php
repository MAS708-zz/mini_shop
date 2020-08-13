@extends('layouts.layout')

@section('subtitle', 'Transaction - Shopping Cart')

@section('breadcrumb')
    @parent
    <a href="/">Home</a><a href="/transaction">/Transaction</a>
@endsection

@section('container')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3>Form Transaksi</h3>

            <table class="table table-bordered">
                <form method="POST" action="{{Route('transaction.store')}}" enctype="multipart/form-data">
                @csrf
                        <tr><td>
                            <div class="col-md-12">
                                <label for="mem">Select Member</label>
                                <select name="member_id" class="form-control form-control-sm" id="mem">
                                     <option value="">--Select Member--</option>
                                     @foreach ($mem_id as $mem)
                                         <option id="{{ $mem->id }}" name = "{{ $mem->id }}" value = "{{ $mem->id }}"
                                             @if ($mem->id == old('member_id', $mem->id))
                                             @endif
                                         >{{ $mem->full_name  }}</option>
                                     @endforeach
                                     @error('member_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                 </select>
                            </div>
                        </td></tr>

                        <tr><td>
                            <div class="col-md-12">
                                <label for="prod">Select Product</label>
                                <select name="product_id" class="form-control form-control-sm" id="prod">
                                     <option value="">--Select Product--</option>
                                     @foreach ($prod_id as $pd)
                                         <option id="{{ $pd->id }}" name = "{{ $pd->id }}" value = "{{ $pd->id }}"
                                             @if ($pd->id == old('product_id', $pd->id))

                                             @endif
                                         >{{ $pd->name  }}</option>
                                     @endforeach
                                     @error('product_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                 </select>
                            </div>
                        </td></tr>

                        <tr><td>
                            <div class="col-md-12">
                                <label for="qty">Quantity</label>
                                <input type="text" placeholder="Insert Quantity...." class="form-control quantityid @error('quantity') is-invalid @enderror " name="quantity" id="qty" value="{{old('quantity')}}">
                                @error('quantity')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </td></tr>

                        <tr><td>
                            <div class="col-md-12">
                                <label for="disc">Discount</label>
                                <input type="text" placeholder="Insert Discount...." class="form-control @error('discount') is-invalid @enderror" name="discount" id="disc" value="{{old('discount')}}">
                                @error('discount')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </td></tr>
                        <button type="submit" class="btn btn-primary my-3">Create</button>
                    </form>
                </table>
            </div>
        </div>
    </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="mt-4">
                        <div class="text-center">
                            <img src="{{ asset($prod_tr[0]['image'])}}" class="img-thumbnail" width="200px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-js')
    <script>
        (function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.quantityid').on('change', function() {
                var id = $(this).attr('quantity')
                $.ajax({
                  type: "PATCH",
                  url: '{{ url("/transaction") }}' + '/' + id,
                  data: {
                    'quantity': this.value,
                  },
                  success: function(data) {
                    window.location.href = '{{ url('/transaction/create') }}';
                  }
                });

            });

        })();

    </script>
@endsection

