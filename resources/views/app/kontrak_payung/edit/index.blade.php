@extends('layout.app')

@section('title', 'Mail Classification')
@section('bodyClass', 'fixed-header menu-pin menu-behind')

@section('content')
    <div class="container-fluid container-fixed-lg">
        <div class="row">
            <div class="col-9">
                <div class="card card-default">
                    <div class="card-header ">
                        <div class="card-title">
                            Edit
                        </div>
                    </div>
                    <div class="card-body">
                        <form autocomplete="off" id="editMailClassificationForm">
                            <div class="form-group form-group-default required ">
                                <label>Nomor</label>
                                <input name="nomor" value="{{ $data['nomor'] }}" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Awal Jangka Waktu Kontrak</label>
                                <input name="tanggal" value="{{ $data['tanggal'] }}" id="datepicker" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Akhir Jangka Waktu Kontrak</label>
                                <input name="akhir_jangka_waktu" value="{{ $data['akhir_jangka_waktu'] }}" id="datepicker" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Principal</label>
                                <select name="distributor_id" class="full-width">
                                    @if (!empty($data->distributor->name))
                                    <option value="{{ $data['distributor_id'] }}">{{ $data->distributor->name }}</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Distributor resmi yang ditunjuk</label>
                                <select name="distributor_rujukan_id" class="full-width">
                                    @if (!empty($data->distributor_rujukan->name))
                                    <option value="{{ $data['distributor_rujukan_id'] }}">{{ $data->distributor_rujukan->name }}</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Nomor SPPH</label>
                                <input name="ssph_number" value="{{ $data['ssph_number'] }}" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Tanggal SPPH</label>
                                <input name="ssph_date" value="{{ $data['ssph_date'] }}" id="datepicker" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Tanggal Balasan SPPH</label>
                                <input name="tanggal_balasan_ssph" value="{{ $data['tanggal_balasan_ssph'] }}" id="datepicker" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Tempat Kontrak</label>
                                <input name="tempat_kontrak" value="{{ $data['tempat_kontrak'] }}" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default form-group-default-select2 required">
                                <label class="">Jenis Pengadaan</label>
                                @component('components.form.awesomeSelect', [
                                    'name' => 'jenis_pengadaan_id',
                                    'items' => $jenis_pengadaan,
                                    'selected' => $data['jenis_pengadaan_id']
                                ])
                                @endcomponent
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card card-default card-action">
                    <div class="card-body">
                        <button id="saveAction" class="btn btn-block btn-success btn-cons m-b-10">
                            <i class="fas fa-save"></i> Save
                        </button>
                        <a href="{{ UrlPrevious(url('/kontrak_payung')) }}" class="btn btn-block btn-primary btn-cons m-b-10">
                            <i class="fas fa-arrow-left"></i> Cancel
                        </a>
                        <button id="deleteOpenModal" class="btn btn-block btn-danger btn-cons">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-default card-action">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="font-montserrat all-caps hint-text">Item</h2>
                            </div>
                        </div>

                        <table class="table table-condensed" style="width: 50%">
                            <tr>
                                <td style="width: 30%">
                                   Item
                                </td>
                                <td style="width: 70%">
                                    <select name="material" class="full-width"></select>
                                </td>
                            </tr>
                        </table>


                        <div style="width: 100%; overflow: scroll;overflow-y: hidden;">
                            <table class="table table-bordered table-condensed" style="width: 1400px; max-width: none; ">
                                <tr>
                                    <th class="text-center" style="width: 5%;">
                                        No
                                    </th>
                                    <th class="text-center" style="width: 20%;">
                                        Nama Obat
                                    </th>
                                    <th class="text-center" style="width: 20%;">
                                        Keterangan
                                    </th>
                                    <th class="text-center" style="width: 6%;">
                                        Satuan
                                    </th>
                                    <th class="text-center" style="width: 10%;">
                                        HNA
                                    </th>
                                    <th class="text-center" style="width: 8%;">
                                        Diskon
                                    </th>
                                    <th class="text-center" style="width: 10%;">
                                        HNA + Diskon
                                    </th>
                                    <th class="text-center" style="width: 10%;">
                                        HNA + Diskon + PPN
                                    </th>
                                    <th class="text-center" style="width: 5%;">
                                        Aksi
                                    </th>
                                </tr>
                                @foreach ($data->kontrak_payung_item as $key => $val)
                                <tr>
                                    <td>
                                        {{ $key+1 }}
                                    </td>
                                    <td>
                                        {{ $val->nama_obat }}
                                    </td>
                                    <td class="text-right">
                                        <input type="text"
                                            onChange="updateKontrakpayungItem(this, '{{ $val->id }}', 'kuantitas');"
                                            class="form-control" value="{{ $val->kuantitas }}" id="kuantitas_{{$val->id}}">
                                    </td>
                                    <td class="text-center">
                                        {{ $val->satuan }}
                                    </td>
                                    <td class="text-right">
                                        <input type="text"
                                            onChange="updateKontrakpayungItem(this, '{{ $val->id }}', 'hna');"
                                            class="form-control" value="{{ $val->hna }}" id="hna_{{$val->id}}">
                                    </td>
                                    <td class="text-right">
                                        <input type="text"
                                            onChange="updateKontrakpayungItem(this, '{{ $val->id }}', 'diskon');"
                                            class="form-control" value="{{ $val->diskon }}"  id="diskon_{{$val->id}}">
                                    </td>
                                    <td class="text-right">
                                        <input type="text"
                                            onChange="updateKontrakpayungItem(this, '{{ $val->id }}', 'hna_diskon');"
                                            class="form-control" value="{{ $val->hna_diskon }}"  id="hna_diskon_{{$val->id}}">
                                    </td>
                                    <td class="text-right">
                                        <input type="text"
                                            onChange="updateKontrakpayungItem(this, '{{ $val->id }}', 'hna_diskon_ppn');"
                                            class="form-control" value="{{ $val->hna_diskon_ppn }}"  id="hna_diskon_ppn_{{$val->id}}">
                                    </td>
                                    <td class="text-right">
                                        <button id="deleteOpenModal" class="btn btn-danger" onClick="deleteItem('{{ $val->id }}')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- Delete Modal --}}
    <div class="modal fade slide-up disable-scroll" id="modalDelete" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-close fs-14"></i>
                        </button>
                        <h5>Delete <span class="semi-bold">User</span></h5>
                        <p class="p-b-10">Are you sure you want to delete this entries?</p>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8">
                            </div>
                            <div class="col-md-4 m-t-10 sm-m-t-10">
                                <button id="deleteAction" class="btn btn-block btn-danger btn-cons m-b-10"><i class="fas fa-trash"></i> Yes Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- /.Delete Modal --}}
@endsection



@section('formValidationScript')
    @include('app.kontrak_payung.edit.scripts.form')
@endsection
