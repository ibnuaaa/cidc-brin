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
                                <label>Nama Distributor</label>
                                <input name="name" value="{{ $data['name'] }}" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Alamat</label>
                                <input name="alamat" value="{{ $data['alamat'] }}" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Telepon</label>
                                <input name="telepon" value="{{ $data['telepon'] }}" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Faksimile</label>
                                <input name="faksimile" value="{{ $data['faksimile'] }}" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Website</label>
                                <input name="website" value="{{ $data['website'] }}" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Email</label>
                                <input name="email" value="{{ $data['email'] }}" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Wakil Sah</label>
                                <input name="wakil_sah" value="{{ $data['wakil_sah'] }}" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Nama Penanggungjawab</label>
                                <input name="nama_penanggung_jawab" value="{{ $data['nama_penanggung_jawab'] }}" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Jabatan Penanggungjawab</label>
                                <input name="jabatan_penanggung_jawab" value="{{ $data['jabatan_penanggung_jawab'] }}" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Nama Bank</label>
                                <input name="nama_bank" value="{{ $data['nama_bank'] }}" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>No Rekening</label>
                                <input name="no_rekening" value="{{ $data['no_rekening'] }}" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Atas Nama Rekening</label>
                                <input name="atas_nama_rekening" value="{{ $data['atas_nama_rekening'] }}" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Ssph_Produk</label>
                                <input name="ssph_produk" value="{{ $data['ssph_produk'] }}" class="form-control" type="text" required>
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
                        <a href="{{ UrlPrevious(url('/distributor')) }}" class="btn btn-block btn-primary btn-cons m-b-10">
                            <i class="fas fa-arrow-left"></i> Cancel
                        </a>
                        <button id="deleteOpenModal" class="btn btn-block btn-danger btn-cons">
                            <i class="fas fa-trash"></i> Delete
                        </button>
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
    @include('app.distributor.edit.scripts.form')
@endsection
