@extends('layout.app')

@section('title', 'Material Request '.$data['name'])
@section('bodyClass', 'fixed-header menu-pin menu-behind')

@section('content')
    <div class="jumbotron jumbotron m-b-0" data-pages="parallax">
        <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/material_request') }}">Material Request</a></li>
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
                        <h2 class="font-montserrat all-caps hint-text">Request Material</h2>
                    </div>
                </div>

                <table class="table table-bordered table-condensed" style="width: 50%">
                    <tr>
                        <td style="width: 30%">
                           Catatan
                        </td>
                        <td style="width: 70%">
                            {{ $data['name'] }}
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

                <table class="table table-condensed" style="width: 50%">
                    <tr>
                        <td style="width: 30%">
                           Material
                        </td>
                        <td style="width: 70%">
                            <select name="material" class="full-width"></select>
                        </td>
                    </tr>
                </table>

                <div style="width: 100%; overflow: scroll;overflow-y: hidden;">
                    <table class="table table-bordered table-condensed condensed" style="width: 1400px; max-width: none; ">
                        <tr>
                            <th class="text-center" style="width: 5%;">
                                No
                            </th>
                            <th class="text-center" style="width: 30%;">
                                Item
                            </th>
                            <th class="text-center" style="width: 15%;">
                                Keterangan
                            </th>
                            <th class="text-center" style="width: 10%;">
                                HNA
                            </th>
                            <th class="text-center" style="width: 10%;">
                                Diskon
                            </th>
                            <th class="text-center" style="width: 10%;">
                                HNA Diskon
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
                            <th class="text-center" style="width: 10%;">
                                Aksi
                            </th>
                        </tr>
                        @foreach ($data->material_request_item as $key => $val)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td>
                                <a onclick="return selectMaterial('{{ $val->id }}');" href="#">
                                    <i>{{ (!empty($val->material->name)) ? $val->material->name : '' }}</i>
                                </a><br />
                                @foreach ($val->material_distributor as $key2 => $val2)
                                    Principal : {{ $val2->distributor->name }}<br />

                                    Distributor : {{!empty($val->distributor_rujukan->name) ? ($val->distributor_rujukan->name) : ''}}

                                    @if ($val2->distributor_id == $val->distributor_id)
                                        <i class="fa fa-check text-black"></i>
                                    @else
                                        <a onClick="return updateMaterialRequestItem('{{ $val2->distributor_id }}','{{ $val->id }}')">
                                            <i class="fa fa-check" style="color: #ccc; cursor: pointer;"></i>
                                        </a>
                                    @endif
                                    <br />
                                @endforeach
                            </td>
                            <td>
                                {{ $val->spesifikasi }}
                            </td>
                            <td class="text-right">
                                {{ number_format($val->hna, 2, ',', '.') }}
                            </td>
                            <td class="text-right">
                                {{ number_format($val->diskon, 2, ',', '.') }}
                            </td>
                            <td class="text-right">
                                {{ number_format($val->hna_diskon, 2, ',', '.') }}
                            </td>
                            <td class="text-right">
                                {{ number_format($val->price, 2, ',', '.') }}
                            </td>
                            <td>
                                <input type="text" onChange="updateMaterial(this, '{{ $val->id }}','qty');" value="{{ $val->qty }}" class="form-control" style="text-align: center;" />
                            </td>
                            <td class="text-center">
                                {{ $val->material->unit_nm_small }}
                            </td>
                            <td class="text-right">
                                <span id="subtotal_{{$val->id}}">{{ number_format($val->subtotal, 2, ',', '.') }}</span>
                            </td>
                            <td class="text-center">
                                <input type="button" onClick="deleteItem('{{ $val->id }}')" value="Hapus" class="btn btn-danger btn-xs"/>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    @include('app.material_request.edit_item.scripts.form')
@endsection
