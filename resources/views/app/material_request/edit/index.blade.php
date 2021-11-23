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
                                <label>Tanggal</label>
                                <input name="tanggal" value="{{ $data['tanggal'] }}" id="datepicker" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Nama pengadaan</label>
                                <input name="name" value="{{ $data['name'] }}" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Bulan</label>

                                @component('components.form.awesomeSelect', [
                                    'name' => 'bulan',
                                    'items' => [[
                                        'label' => '-= Bulan =-',
                                        'value' => ''
                                    ],[
                                        'label' => 'Januari',
                                        'value' => '1'
                                    ],[
                                        'label' => 'Februari',
                                        'value' => '2'
                                    ],[
                                        'label' => 'Maret',
                                        'value' => '3'
                                    ],[
                                        'label' => 'April',
                                        'value' => '4'
                                    ],[
                                        'label' => 'Mei',
                                        'value' => '5'
                                    ],[
                                        'label' => 'Juni',
                                        'value' => '6'
                                    ],[
                                        'label' => 'Juli',
                                        'value' => '7'
                                    ],[
                                        'label' => 'Agustus',
                                        'value' => '8'
                                    ],[
                                        'label' => 'September',
                                        'value' => '9'
                                    ],[
                                        'label' => 'Oktober',
                                        'value' => '10'
                                    ],[
                                        'label' => 'November',
                                        'value' => '11'
                                    ],[
                                        'label' => 'Desember',
                                        'value' => '12'
                                    ]],
                                    'selected' => $data['bulan']
                                ])
                                @endcomponent

                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Tahun</label>
                                <input name="tahun" value="{{ $data['tahun'] }}" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Ketentuan Pengiriman</label>
                                <textarea style="height: 100px;" name="ketentuan_pengiriman" class="form-control" required>{{ $data['ketentuan_pengiriman'] }}</textarea>
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
                        <a href="{{ UrlPrevious(url('/material_request')) }}" class="btn btn-block btn-primary btn-cons m-b-10">
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
    @include('app.material_request.edit.scripts.form')
@endsection
