@extends('layout.app')

@section('title', 'Material Request '.$data['name'])
@section('bodyClass', 'fixed-header menu-pin menu-behind')

@section('content')

    <?php
        $inputStatus="disabled";
        if ($receive_request->approval_status == '')  $inputStatus="";
    ?>

    <div class="jumbotron jumbotron m-b-0" data-pages="parallax">
        <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/purchase_order') }}">Penerimaan barang</a></li>
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
                        <h2 class="font-montserrat all-caps hint-text">Penerimaan Barang</h2>
                    </div>
                </div>

                <table class="table table-bordered table-condensed condensed" style="width: 100%">
                    <tr>
                        <td class="text-right">
                           Tanggal Diterima
                        </td>
                        <td>
                            <input name="tgl_terima" value="{{ $receive_request['tgl_terima'] }}" id="datepicker" class="form-control" type="text" onChange="updateReceive(this, {{ $receive_request['id'] }},'tgl_terima')" {{$inputStatus}} required>

                        </td>
                        <td class="text-right">
                           Jenis Pembelian
                        </td>
                        <td>
                            @component('components.form.awesomeSelect', [
                                'name' => 'jenis_pembelian',
                                'items' => [
                                    ['value' => '', 'label' => '-= Pilih =-'],
                                    ['value' => '1', 'label' => 'Regular'],
                                    ['value' => '2', 'label' => 'Konsinyasi']
                                ],
                                'selected' => $receive_request['jenis_pembelian'],
                                'onChange' => 'updateReceive(this, \''.$receive_request['id'].'\',\'jenis_pembelian\')',
                                'disabled' => $inputStatus
                            ])
                            @endcomponent
                        </td>
                        <td class="text-right">
                           No Faktur
                        </td>
                        <td>
                            <input name="no_faktur" value="{{ $receive_request['no_faktur'] }}" class="form-control" type="text" onChange="updateReceive(this, {{ $receive_request['id'] }},'no_faktur')" {{$inputStatus}}  required>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">
                           Tanggal jatuh Tempo
                        </td>
                        <td>
                            <input name="tgl_jatuh_tempo" value="{{ $receive_request['tgl_jatuh_tempo'] }}" id="datepicker" class="form-control" type="text" onChange="updateReceive(this, {{ $receive_request['id'] }},'tgl_jatuh_tempo')"
                            {{$inputStatus}}
                            required>
                        </td>
                        <td class="text-right">
                           E Catalog
                        </td>
                        <td>
                            @component('components.form.awesomeSelect', [
                                'name' => 'e_catalog',
                                'items' => [
                                    ['value' => '', 'label' => '-= Pilih =-'],
                                    ['value' => '1', 'label' => 'E-Catalog'],
                                    ['value' => '2', 'label' => 'Non E-catalog']
                                ],
                                'selected' => $receive_request['e_catalog'],
                                'onChange' => 'updateReceive(this, \''.$receive_request['id'].'\',\'e_catalog\')',
                                'disabled' => $inputStatus
                            ])
                            @endcomponent
                        </td>
                        <td class="text-right">
                           Surat Jalan
                        </td>
                        <td>
                            <input name="surat_jalan" value="{{ $receive_request['surat_jalan'] }}" class="form-control" type="text" onChange="updateReceive(this, {{ $receive_request['id'] }},'surat_jalan')"
                            {{$inputStatus}}
                            required>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">
                           Tanggal Invoice
                        </td>
                        <td>
                            <input name="tgl_invoice" value="{{ $receive_request['tgl_invoice'] }}" id="datepicker" class="form-control" type="text" onChange="updateReceive(this, {{ $receive_request['id'] }},'tgl_invoice')"
                            {{$inputStatus}}
                            required>
                        </td>
                        <td class="text-right">
                           ID Paket
                        </td>
                        <td>
                            <input name="paket_id" value="{{ $receive_request['paket_id'] }}" class="form-control" type="text"  onChange="updateReceive(this, {{ $receive_request['id'] }},'paket_id')"
                            {{$inputStatus}}
                            required>
                        </td>
                        <td class="text-right">
                           Petugas Pengiriman
                        </td>
                        <td>
                            <input name="petugas_pengiriman" value="{{ $receive_request['petugas_pengiriman'] }}" class="form-control" type="text" onChange="updateReceive(this, {{ $receive_request['id'] }},'petugas_pengiriman')"
                            {{$inputStatus}}
                            required>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                        </td>
                        <td class="text-right">
                           Tipe Barang
                        </td>
                        <td>
                            {{ $kontrak_payung->jenis_pengadaan2->name }}
                        </td>
                        <td class="text-right">
                           No BAPB
                        </td>
                        <td>
                            <input name="no_spb" value="{{ $receive_request['no_spb'] }}" class="form-control" type="text" onChange="updateReceive(this, {{ $receive_request['id'] }},'no_spb')"
                            {{$inputStatus}}
                            required>
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
                    <table class="table table-bordered table-condensed condensed" style="width: 1200px; max-width: none; ">
                        <tr>
                            <th class="text-center" style="width: 5%;">
                                No
                            </th>
                            <th class="text-center" style="width: 20%;">
                                Item
                            </th>
                            <th class="text-center" style="width: 6%;">
                                Qty Request
                            </th>
                            <th class="text-center" style="width: 7%;">
                                Total Diterima
                            </th>
                            <th class="text-center" style="width: 7%;">
                                Qty Terima
                            </th>
                            <th class="text-center" style="width: 7%;">
                                Sisa
                            </th>
                            <th class="text-center" style="width: 13%;">
                                Kadaluwarsa
                            </th>
                            <th class="text-center" style="width: 6%;">
                                Margin (%)
                            </th>
                            <th class="text-center" style="width: 10%;">
                                Harga Jual
                            </th>
                            <th class="text-center" style="width: 6%;">
                                Unit
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
                            <td>
                                {{ $val->qty }}
                            </td>
                            <td>
                                <?php
                                    $ttl = 0;
                                    foreach ($val->receive_request_item_approved as $key => $value) {
                                        $ttl += $value->qty;
                                    }
                                ?>

                                {{$ttl}}
                            </td>
                            <td>
                                <?php

                                    $qty = 0;
                                    $expired_date = '';
                                    $margin = '';
                                    $harga_jual = 0;
                                    $receive_request_item_id = 0;
                                    if (!empty($receive_request_item[$val->id])) {
                                        $receive_request_item_id = $receive_request_item[$val->id]->id;
                                        $qty = $receive_request_item[$val->id]->qty;
                                        $expired_date  = $receive_request_item[$val->id]->expired_date;
                                        $margin  = $receive_request_item[$val->id]->margin;
                                        $harga_jual  = $receive_request_item[$val->id]->harga_jual;
                                    }
                                ?>

                                <input
                                    onChange="updateItem(this, '{{ $val->id }}', '{{ $receive_request->id }}', '{{ $val->material->id }}','qty');"
                                    class="form-control"
                                    type="text"
                                    {{$inputStatus}}
                                    value="{{ $qty }}"
                                />
                            </td>
                            <td>
                                {{ $val->qty - $ttl }}
                            </td>

                            <td>
                                <input
                                    onChange="updateItem(this, '{{ $val->id }}', '{{ $receive_request->id }}', '{{ $val->material->id }}','expired_date');"
                                    class="form-control"
                                    type="text"
                                    id="datepicker"
                                    {{$inputStatus}}
                                    value="{{ $expired_date }}"
                                />
                            </td>
                            <td>

                                <?php

                                if ($receive_request_item_id == 0) {
                                    $price = $val->price;
                                    $margin = 0;
                                    if ($price > 0 && $price <= 1000000 ) {
                                        $margin = 25;
                                    } else if ($price > 1000000 && $price <= 5000000 ) {
                                        $margin = 20;
                                    } else if ($price > 5000000 && $price <= 100000000 ) {
                                        $margin = 15;
                                    } else if ($price > 100000000 && $price <= 200000000 ) {
                                        $margin = 5;
                                    } else if ($price > 200000000) {
                                        $margin = 2.5;
                                    }
                                }


                                ?>

                                <input
                                    onChange="updateItem(this, '{{ $val->id }}', '{{ $receive_request->id }}', '{{ $val->material->id }}','margin');"
                                    class="form-control"
                                    type="text"
                                    id="margin_{{ $val->id }}"
                                    {{$inputStatus}}
                                    value="{{ $margin }}"
                                />
                            </td>
                            <td class="text-right">
                                <span id="harga_jual_{{$val->id}}">{{ number_format($harga_jual,2,',','.')}}</span>
                            </td>


                            <td class="text-center">
                                {{ $val->material->unit_nm_small   }}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>

                @if (getPermissions('btn_approval_kepala_instalasi_farmasi')['checked'])
                    @if ($receive_request->approval_status == '')
                    <input type="button" class="btn btn-primary m-t-20" value="Approve" onClick="approve()">
                    @endif
                @endif

            </div>
        </div>

    </div>
@endsection

@section('script')
    @include('app.receive_request.edit_item.scripts.form')
@endsection
