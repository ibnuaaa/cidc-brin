@extends('layout.app')

@section('title', 'Purchase Order '.$data['name'])
@section('bodyClass', 'fixed-header menu-pin menu-behind')

@section('content')
    <div class="jumbotron jumbotron m-b-0" data-pages="parallax">
        <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/purchase_order') }}">Purchase Order</a></li>
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
                        <td colspan="2" valign="top">
                            Ketentuan Pengiriman :<br/>
                            {{ $data['ketentuan_pengiriman'] }}
                            <br/>
                        </td>
                        <td colspan="2" valign="top">
                            Status Alokasi Keuangan : {{ !empty($data->material_request->status_alokasi) ? $data->material_request->status_alokasi : 'Belum Ada' }}<br>
                            Dinyatakan Oleh : {{ !empty($data->material_request->status_alokasi_user2->name) ? $data->material_request->status_alokasi_user2->name : '-' }}<br>
                            Dinyatakan Pada tanggal : {{ !empty($data->material_request->status_alokasi_at) ? dateIndo($data->material_request->status_alokasi_at) . ' '.  jamIndo($data->material_request->status_alokasi_at): '-' }}<br/>
                            Notes : {{ $data->material_request->status_alokasi_notes }}
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


                <div style="width: 100%; overflow: scroll;overflow-y: hidden;">
                    <table class="table table-bordered table-condensed" style="width: 1100px; max-width: none; ">
                        <tr>
                            <th class="text-center" style="width: 5%;">
                                No
                            </th>
                            <th class="text-center" style="width: 20%;">
                                Nama Bahan
                            </th>
                            <th class="text-center" style="width: 10%;">
                                Spesifikasi
                            </th>
                            <th class="text-center" style="width: 10%;">
                                Volume
                            </th>
                            <th class="text-center" style="width: 6%;">
                                Satuan
                            </th>
                            <th class="text-center" style="width: 10%;">
                                Harga Satuan (Rp)
                            </th>
                            <th class="text-center" style="width: 10%;">
                                Subtotal (Rp)
                            </th>
                        </tr>
                        <?php $total = 0; ?>
                        @foreach ($data->purchase_order_item as $key => $val)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td>
                                {{ $val->material->name }}
                            </td>
                            <td>
                                {{ $val->spesifikasi }}
                            </td>
                            <td class="text-center">
                                {{ $val->qty }}
                            </td>
                            <td class="text-center">
                                {{ $val->material->unit_nm_small }}
                            </td>
                            <td class="text-right">
                                {{ number_format($val->price, 2, ',', '.') }}
                            </td>
                            <td class="text-right">
                                {{ number_format($val->subtotal, 2, ',', '.') }}
                            </td>
                        </tr>
                        <?php $total += $val->subtotal; ?>
                        @endforeach
                        <tr>
                            <td colspan="6" class="text-right">
                                Total
                            </td>
                            <td class="text-right">
                                {{ number_format($total, 2, ',', '.') }}
                            </td>
                        </tr>
                    </table>
                </div>
                <br />

                @if (getPermissions('btn_approval_po')['checked'])
                    @if (!$data->ppk_user_id)
                    <input type="button" class="btn btn-primary" value="Approve PPK" onClick="approve('approve')">
                    @endif
                    @if (!$data->ppk_user_id)
                    <input type="button" class="btn btn-danger" value="Reject PPK" onClick="approve('reject')">
                    @endif
                @endif
            </div>
        </div>

    </div>
@endsection

@section('script')
    @include('app.purchase_order.detail.scripts.form')
@endsection
