@extends('layout.app')

@section('title', 'Approval Anggaran '.$data['name'])
@section('bodyClass', 'fixed-header menu-pin menu-behind')

@section('content')
    <div class="jumbotron jumbotron m-b-0" data-pages="parallax">
        <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/material_request') }}">Approval Anggaran</a></li>
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
                        <h2 class="font-montserrat all-caps hint-text">Approval Anggaran</h2>
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
                            Status Alokasi Keuangan : {{ !empty($data->status_alokasi) ? $data->status_alokasi : 'Belum Ada' }}<br>
                            Dinyatakan Oleh : {{ !empty($data->status_alokasi_user->name) ? $data->status_alokasi_user->name : '-' }}<br>
                            Dinyatakan Pada tanggal : {{ !empty($data->status_alokasi_at) ? $data->status_alokasi_at : '-' }}<br/>
                            Notes : {{ $data->status_alokasi_notes }}
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

                    <?php $subtotal = 0; ?>
                    @foreach ($data->material_request_item as $key => $val)
                    <tr>
                        <td>
                            {{ $key+1 }}
                        </td>
                        <td>
                            {{ $val->material->name }}
                        </td>
                        <td class="text-right">
                            {{ number_format($val->price, 2, ',', '.') }}
                        </td>
                        <td class="text-center">
                            {{ $val->qty }}
                        </td>
                        <td class="text-center">
                            {{ $val->material->unit_nm_small }}
                        </td>
                        <td class="text-right">
                            {{ number_format($val->subtotal, 2, ',', '.') }}
                        </td>
                    </tr>

                    <?php $subtotal += $val->subtotal; ?>

                    @endforeach
                    <tr>
                        <td class="text-right" colspan="5">
                            Total
                        </td>
                        <td class="text-right">
                            {{ number_format($subtotal, 2, ',', '.') }}
                        </td>
                    </tr>

                </table>

                <br />

                @if (getPermissions('btn_approval_kepala_keuangan')['checked'])
                    @if (!$data->status_alokasi)
                    <input type="button" class="btn btn-primary" value="Approval Keuangan" onClick="openModalKeuangan()">
                    @endif
                @endif

            </div>
        </div>

    </div>


    <div class="modal fade slide-up disable-scroll" id="modalKeuangan" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-close fs-14"></i>
                        </button>
                        <h5>Approval <span class="semi-bold">Keuangan</span></h5>
                    </div>
                    <div class="modal-body">
                        <textarea id="status_alokasi_notes" class="form-control m-b-20" placeholder="Masukkan catatan di sini..." style="height: 100px;"></textarea>
                        <div class="row">
                            <div class="col-md-6">
                                <a onClick="setStatusAlokasi('tersedia')" class="btn btn-block btn-success btn-cons m-b-10 text-white">
                                    <i class="fas fa-check"></i>&nbsp;&nbsp;Alokasi Tersedia
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a onClick="setStatusAlokasi('tidak_tersedia')" class="btn btn-block btn-danger btn-cons m-b-10 text-white">
                                    <i class="fas fa-close"></i>&nbsp;&nbsp;Alokasi Tidak Tersedia
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('app.material_request.detail.scripts.form')
@endsection
