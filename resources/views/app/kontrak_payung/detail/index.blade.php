@extends('layout.app')

@section('title', 'Payung Hukum '.$data['name'])
@section('bodyClass', 'fixed-header menu-pin menu-behind')

@section('content')
    <div class="jumbotron jumbotron m-b-0" data-pages="parallax">
        <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/kontrak_payung') }}">Payung Hukum</a></li>
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
                        <h2 class="font-montserrat all-caps hint-text">Kontrak Payung</h2>
                    </div>
                </div>

                <table class="table table-bordered table-condensed" style="width: 100%">
                    <tr>
                        <td>
                           Nomor
                        </td>
                        <td>
                            {{ $data['nomor'] }}
                        </td>
                        <td>
                           Waktu Kontrak
                        </td>
                        <td>
                            {{ $data['tanggal'] }} - {{ $data->akhir_jangka_waktu }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                           Principal
                        </td>
                        <td>
                            {{ $data->distributor->name }}<br />
                            Penanggungjawab<br/>
                            {{ $data->distributor->nama_penanggung_jawab }} /
                            {{ $data->distributor->jabatan_penanggung_jawab }}
                        </td>
                        <td>
                            Distributor resmi yang ditunjuk
                        </td>
                        <td>
                            {{ $data->distributor_rujukan->name }}<br />
                            Penanggungjawab<br/>
                            {{ $data->distributor_rujukan->nama_penanggung_jawab }} /
                            {{ $data->distributor_rujukan->jabatan_penanggung_jawab }}
                        </td>

                    </tr>

                </table>
            </div>
        </div>

        @if (empty($data->kontrak_payung_approve_user_id))
        <div class="card card-default m-t-20">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="font-montserrat all-caps hint-text">Upload File excel</h2>
                    </div>
                </div>
                <div class="card-body">
                    <input type="file" onchange="prepareUpload(this);" multiple>

                    <br /><br /><br />
                    <a href="/kontrak_payung_ver_1.xlsx">Download Contoh File Excel Impor</a>
                </div>
            </div>
        </div>
        @endif
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
                        <th class="text-center" style="width: 10%;">
                            Obj ID
                        </th>
                        <th class="text-center" style="width: 10%;">
                            Nama Obat
                        </th>
                        <th class="text-center" style="width: 10%;">
                            Keterangan
                        </th>
                        <th class="text-center" style="width: 6%;">
                            Satuan
                        </th>
                        <th class="text-center" style="width: 10%;">
                            HNA
                        </th>
                        <th class="text-center" style="width: 10%;">
                            Diskon
                        </th>
                        <th class="text-center" style="width: 10%;">
                            HNA + Diskon
                        </th>
                        <th class="text-center" style="width: 10%;">
                            HNA + Diskon + PPN
                        </th>
                    </tr>
                    @foreach ($data->kontrak_payung_item as $key => $val)
                    <tr>
                        <td>
                            {{ $key+1 }}
                        </td>
                        <td>
                            {{ $val->obj_id }}
                        </td>
                        <td class="text-right">
                            {{ $val->nama_obat }}
                        </td>
                        <td>
                            {{ $val->kuantitas }}
                        </td>
                        <td class="text-center">
                            {{ $val->satuan }}
                        </td>
                        <td class="text-right">
                            {{ $val->hna }}
                        </td>
                        <td class="text-right">
                            {{ $val->diskon }}
                        </td>
                        <td class="text-right">
                            {{ $val->hna_diskon }}
                        </td>
                        <td class="text-right">
                            {{ $val->hna_diskon_ppn }}
                        </td>
                    </tr>
                    @endforeach
                </table>

                <br />
                @if (getPermissions('btn_approval_kontrak_payung')['checked'])
                    @if (empty($data->kontrak_payung_approval_user))
                    <input type="button" class="btn btn-primary" value="Approve Kontrak Payung" onClick="approve()">
                    @endif
                @endif
            </div>
        </div>

    </div>
@endsection

@section('script')
    @include('app.kontrak_payung.detail.scripts.form')
@endsection
