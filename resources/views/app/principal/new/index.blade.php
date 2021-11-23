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
                            New #principal
                        </div>
                    </div>
                    <div class="card-body">
                        <form autocomplete="off" id="newUserForm">
                            <div class="form-group form-group-default required ">
                                <label>Nama Principal</label>
                                <input name="name" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Alamat</label>
                                <input name="alamat" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Telepon</label>
                                <input name="telepon" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Faksimile</label>
                                <input name="faksimile" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Website</label>
                                <input name="website" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Email</label>
                                <input name="email" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Wakil Sah</label>
                                <input name="wakil_sah" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Nama Penanggungjawab</label>
                                <input name="nama_penanggung_jawab" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Jabatan Penanggungjawab</label>
                                <input name="jabatan_penanggung_jawab" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Nama Bank</label>
                                <input name="nama_bank" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>No Rekening</label>
                                <input name="no_rekening" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Atas Nama Rekening</label>
                                <input name="atas_nama_rekening" class="form-control" type="text" required>
                            </div>


                            <div class="form-group form-group-default required ">
                                <label>Nomor Akta Pendirian Perusahaan</label>
                                <input name="nomor_akta_pendirian_perusahaan" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Tanggal Akta Pendirian Perusahaan</label>
                                <input name="tanggal_akta_pendirian_perusahaan" id="datepicker" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Nomor Akta Perubahan Terakhir</label>
                                <input name="nomor_akta_perubahan_terakhir" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Tanggal Akta Perubahan Terakhir</label>
                                <input name="tanggal_akta_perubahan_terakhir" id="datepicker" class="form-control" type="text" required>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card card-default card-action">
                    <div class="card-body">
                        <button data-url-next="{{ UrlPrevious(url('/principal')) }}" class="saveAction btn btn-block btn-success btn-cons m-b-10">
                            <i class="fas fa-save"></i>
                            Save
                        </button>
                        <a href="{{ url('/principal') }}" class="btn btn-block btn-primary btn-cons m-b-10"><i class="fas fa-arrow-left"></i> Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('formValidationScript')
    @include('app.principal.new.scripts.form')
@endsection
