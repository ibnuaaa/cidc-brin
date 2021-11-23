@extends('layout.app')

@section('title', 'Information')
@section('bodyClass', 'fixed-header menu-pin menu-behind')

@section('content')
    <div class="container-fluid container-fixed-lg">
        <div class="row">
            <div class="col-9">
                <div class="card card-default">
                    <div class="card-header ">
                        <div class="card-title">
                            Kontrak Payung Baru
                        </div>
                    </div>

                    <div class="card-body">
                        <form autocomplete="off" id="newUserForm">
                            <div class="form-group form-group-default required ">
                                <label>Nomor</label>
                                <input name="nomor" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Awal Jangka Waktu Kontrak</label>
                                <input name="tanggal" id="datepicker" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Akhir Jangka Waktu Kontrak</label>
                                <input name="akhir_jangka_waktu" id="datepicker" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Principal</label>
                                <select name="distributor_id" class="full-width"></select>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Distributor Resmi yang ditunjuk</label>
                                <select name="distributor_rujukan_id" class="full-width"></select>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Nomor SPPH</label>
                                <input name="ssph_number" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Tanggal SPPH</label>
                                <input name="ssph_date" id="datepicker" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Tanggal Balasan SPPH</label>
                                <input name="tanggal_balasan_ssph" id="datepicker" class="form-control" type="text" required>
                            </div>

                            <div class="form-group form-group-default required ">
                                <label>Tempat Kontrak</label>
                                <input name="tempat_kontrak" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default form-group-default-select2 required">
                                <label class="">Jenis Pengadaan</label>
                                @component('components.form.awesomeSelect', [
                                    'name' => 'jenis_pengadaan_id',
                                    'items' => $jenis_pengadaan,
                                    'selected' => null
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
                        <button data-url-next="{{ UrlPrevious(url('/kontrak_payung')) }}" class="saveAction btn btn-block btn-success btn-cons m-b-10">
                            <i class="fas fa-save"></i>
                            Save
                        </button>
                        <a href="{{ url('/kontrak_payung') }}" class="btn btn-block btn-primary btn-cons m-b-10"><i class="fas fa-arrow-left"></i> Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('formValidationScript')
    @include('app.kontrak_payung.new.scripts.form')
@endsection
