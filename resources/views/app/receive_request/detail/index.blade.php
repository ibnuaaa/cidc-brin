@extends('layout.app')

@section('title', 'Material Request '.$data['name'])
@section('bodyClass', 'fixed-header menu-pin menu-behind')

@section('content')
    <div class="jumbotron jumbotron m-b-0" data-pages="parallax">
        <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/purchase_order') }}">Material Request</a></li>
                    <li class="breadcrumb-item active">Detail #{{ $data['name'] }}</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="container-fluid container-fixed-lg">
        <div class="card card-default m-t-20">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="font-montserrat all-caps hint-text">Order PO</h2>
                    </div>
                </div>

                <table class="table table-bordered table-condensed" style="width: 100%">
                    <tr>
                        <td>
                           Nama Pengandaan
                        </td>
                        <td>
                            {{ $data['name'] }}
                        </td>
                        <td>
                           Bulan
                        </td>
                        <td>
                            {{ $data['bulan'] }}
                        </td>

                    </tr>
                    <tr>
                        <td>
                           Nomor
                        </td>
                        <td>
                            {{ $data['nomor'] }}
                        </td>
                        <td>
                           Tahun
                        </td>
                        <td>
                            {{ $data['tahun'] }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            Ketentuan Pengiriman :<br/>
                            {{ $data['ketentuan_pengiriman'] }}
                            <br/>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card card-default m-t-20">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="font-montserrat all-caps hint-text">Item</h2>
                    </div>
                </div>


                <table class="table table-bordered table-condensed">
                    <tr>
                        <th class="text-center" style="width: 5%;">
                            No
                        </th>
                        <th class="text-center" style="width: 30%;">
                            Item
                        </th>
                        <th class="text-center" style="width: 10%;">
                            Harga Satuan (Rp)
                        </th>
                        <th class="text-center" style="width: 10%;">
                            Qty
                        </th>
                        <th class="text-center" style="width: 6%;">
                            Unit
                        </th>
                        <th class="text-center" style="width: 10%;">
                            Subtotal (Rp)
                        </th>
                    </tr>
                    @foreach ($data->purchase_order_item as $key => $val)
                    <tr>
                        <td>
                            {{ $key+1 }}
                        </td>
                        <td>
                            {{ $val->material->name }}
                        </td>
                        <td class="text-right">
                            {{ number_format($val->price, 0, ',', '.') }}
                        </td>
                        <td>
                            {{ $val->qty }}
                        </td>
                        <td class="text-center">
                            {{ $val->material->unit_nm_small }}
                        </td>
                        <td class="text-right">
                            {{ number_format($val->subtotal, 0, ',', '.') }}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
@endsection

@section('script')
    @include('app.purchase_order.detail.scripts.form')
@endsection
