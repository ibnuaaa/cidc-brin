@extends('layout.app')

@section('title', 'Dashboard')
@section('bodyClass', 'fixed-header dashboard menu-pin menu-behind')

@section('content')
    <div class="container-fluid container-fixed-lg">
        <div class="card card-white">
            <div class="card-body text-center" style="font-size: 40px;">
                <b>
                    <div class="m-b-20">
                        SELAMAT DATANG
                    </div>
                    <div class="m-b-20">
                        di
                    </div>
                    <div class="m-b-20">
                        <span style="font-weight: bold; font-size: 40px;"><i>(CIdC)</i></span>
                    </div>
                    <div class="m-b-20">
                        <span style="font-weight: bold; font-size: 40px;">Cetak Identity Card</span> <br>
                    </div>
                    <div class="m-b-20">
                        <img src="/assets/img/logo-brin.png">
                    </div>
                    Badan Riset dan Inovasi Nasional
                </b>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('app.home.scripts.index')
@endsection

@section('formValidationScript')
    @include('app.home.scripts.form')
@endsection
