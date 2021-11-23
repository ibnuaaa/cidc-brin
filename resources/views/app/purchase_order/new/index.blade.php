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
                            Order PO Baru
                        </div>
                    </div>

                    <div class="card-body">
                        <form autocomplete="off" id="newUserForm">
                            <div class="form-group form-group-default required ">
                                <label>Nomor</label>
                                <input name="nomor" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Tanggal</label>
                                <input name="tanggal" id="datepicker" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Nama pengadaan</label>
                                <input name="name" class="form-control" type="text" required>
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
                                    'selected' => ''
                                ])
                                @endcomponent
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Tahun</label>
                                <input name="tahun" class="form-control" type="text" required>
                            </div>
                            <div class="form-group form-group-default required ">
                                <label>Ketentuan Pengiriman</label>
                                <textarea style="height: 100px;" name="ketentuan_pengiriman" class="form-control" required></textarea>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card card-default card-action">
                    <div class="card-body">
                        <button data-url-next="{{ UrlPrevious(url('/purchase_order')) }}" class="saveAction btn btn-block btn-success btn-cons m-b-10">
                            <i class="fas fa-save"></i>
                            Save
                        </button>
                        <a href="{{ url('/purchase_order') }}" class="btn btn-block btn-primary btn-cons m-b-10"><i class="fas fa-arrow-left"></i> Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('formValidationScript')
    @include('app.purchase_order.new.scripts.form')
@endsection
