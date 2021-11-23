@extends('layout.app')

@section('title', 'User '.$data->name)
@section('bodyClass', 'fixed-header menu-pin menu-behind')

@section('content')
    <div class="jumbotron jumbotron m-b-0" data-pages="parallax">
        <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/information') }}">Principal</a></li>
                </ol>
            </div>
        </div>
    </div>
    <div class="container-fluid container-fixed-lg">
        <div class="card card-default m-t-20">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="font-montserrat all-caps hint-text">Ubah Harga Principal</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-condensed" style="width: 50%">
                            <tr>
                                <td style="width: 30%">
                                   Name
                                </td>
                                <td style="width: 70%">
                                    {{ $data->name }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 30%">
                                   Material
                                </td>
                                <td style="width: 70%">
                                    <select name="material" class="full-width"></select>
                                </td>
                            </tr>
                        </table>
                        <table class="table table-bordered table-condensed">
                            <tr>
                                <th style="width: 10%;">
                                    No
                                </th>
                                <th style="width: 60%;">
                                    Nama Material
                                </th>
                                <th style="width: 30%;">
                                    Harga
                                </th>
                                <th style="width: 30%;">
                                    Action
                                </th>
                            </tr>

                            @if ($data->material_distributor)
                                @foreach ($data->material_distributor as $key => $val)
                                <tr>
                                    <td style="width: 10%;">
                                        {{ $key+1 }}
                                    </td>
                                    <td style="width: 60%;">
                                        {{ $val->material->name }}
                                    </td>
                                    <td style="width: 30%;">
                                        <input type="text" class="form-control" value="{{ $val->price }}" onChange="updateMaterial(this, '{{ $val->id }}');">
                                    </td>
                                    <td style="width: 30%;">
                                        <input type="button" class="btn btn-danger btn-xs" value="Hapus" onClick="deleteMaterial('{{ $val->id }}');">
                                    </td>
                                </tr>
                                @endforeach
                            @endif

                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('script')
    @include('app.principal.edit_harga.scripts.form')
@endsection
