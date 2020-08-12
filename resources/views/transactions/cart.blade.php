@extends('layouts.layout')

@section('subtitle', 'Cart Transactions')

@section('breadcrumb')
    @parent
        <a href="#">Home</a><a href="#">/Product</a>
@endsection

@section('container')

    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Pesanan Diterima</h2>
                    <div class="page_link">
            <a href="{{ url('/') }}">Home</a>
                        <a href="">Invoice</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Order Details Area =================-->
    <section class="order_details p_120">
        <div class="container">
            <h3 class="title_confirmation">Terima kasih, pesanan anda telah kami terima.</h3>
            <div class="row order_d_inner">
                <div class="col-lg-6">
                    <div class="details_item">
                        <h4>Informasi Pesanan</h4>
                        <ul class="list">
                            <li>
                                <a href="#">
                <span>Invoice</span> :Invoce$</a>
                            </li>
                            <li>
                                <a href="#">
                <span>Tanggal</span> : 29 mei 2020</a>
                            </li>
                            <li>
                                <a href="#">
                <span>Total</span> : Rp 250.000</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="details_item">
                        <h4>Informasi Pemesan</h4>
                        <ul class="list">
                            <li>
                                <a href="#">
                <span>Alamat</span> : Jalan Sementara</a>
                            </li>
                            <li>
                                <a href="#">
                <span>Kota</span> : Sementara</a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>Country</span> : Indonesia</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Order Details Area =================-->


@endsection
