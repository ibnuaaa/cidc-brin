@extends('layout.app')

@section('title', 'Information')
@section('bodyClass', 'fixed-header menu-pin menu-behind')

@section('content')
    <div class="container-fluid container-fixed-lg">
        <nav class="navbar navbar-default bg-transparent sm-padding-10 full-width p-t-0 p-b-0 m-b-0" role="navigation">
            <div class="container-fluid full-width">
                <div class="navbar-header text-center">
                    <button type="button" class="navbar-toggle collapsed btn btn-link no-padding" data-toggle="collapse" data-target="#sub-nav">
                        <i class="pg pg-more v-align-middle"></i>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <div class="row">
                        <div class="col-sm-4">
                            <ul class="navbar-nav d-flex flex-row">
                                <li class="nav-item">
                                    <a href="{{ url('/material_request/new') }}"><i class="fas fa-plus"></i> Create</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                            <ul class="navbar-nav d-flex flex-row justify-content-sm-end">
                                <li class="nav-item"><a href="#" class="p-r-10" onclick="$.Pages.setFullScreen(document.querySelector('html'));"><i class="fa fa-expand"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="card card-white">
            <div class="card-header ">
                <div class="card-title">Material Request Data</div><br>
            </div>
            <div class="card-body">
                @component('components.table', ['data' => $data, 'props' => []])
                    @scopedslot('head', ($item))
                        @if($item->name === 'No')
                            <th style="width: 5%">{{ $item->name }}</th>
                        @elseif($item->name === 'action')
                            <th style="width: 20%">{{ $item->name }}</th>
                        @else
                            <th style="width: 112px">{{ $item->name }}</th>
                        @endif
                    @endscopedslot
                    @scopedslot('record', ($item, $props, $number))
                        <tr>
                            <td class="v-align-middle ">
                                <p>{{ $number }}</p>
                            </td>
                            <td class="v-align-middle ">
                                <p>{{ $item->name }}</p>
                            </td>
                            <td class="v-align-middle ">
                                <p>{{ $item->created_at }}</p>
                            </td>
                            <td class="v-align-middle ">
                                <p>{{ $item->pj_logistik_produksi ? $item->pj_logistik_produksi->name : '' }}</p>
                            </td>
                            <td class="v-align-middle">
                                @if (!empty($item->status))
                                    <label class="label label-success">{{$item->status}}</label>
                                @endif
                                @if (empty($item->status))
                                    <label class="label label-warning">Draft</label>
                                @endif
                            </td>
                            <td class="v-align-middle">
                                @if (empty($item->kepala_instalasi_farmasi_user_id))
                                    @if (MyAccount()->position_id!=4)
                                    <div class="btn-group">
                                        <a href="{{ url('/material_request/edit/'.$item->id) }}" class="btn btn-success btn-xs">Edit</a>
                                        <a href="{{ url('/material_request/edit_item/'.$item->id) }}" class="btn btn-warning btn-xs">Edit Item</a>
                                        <a href="#modalDelete" data-toggle="modal" data-record-id="{{$item->id}}" data-record-name="{{$item->key}}" class="btn btn-danger btn-xs">Delete</a>
                                    </div>
                                    <br />
                                    @endif
                                @endif


                                <div class="btn-group m-t-10">
                                    <a href="{{ url('/material_request/'.$item->id) }}" class="btn btn-primary btn-xs">
                                        Detail
                                    </a>
                                </div>

                                @if (!empty($item->kepala_instalasi_farmasi_user_id))
                                    <div class="btn-group m-t-10">
                                        <a href="{{ url('/material_request/cetak_request/'.$item->id) }}" class="btn btn-primary btn-xs">Cetak Request</a>
                                    </div>
                                @endif


                            </td>
                        </tr>
                    @endscopedslot
                @endcomponent
            </div>
        </div>
    </div>
    {{-- Detail Modal --}}
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
                                <a href="#" id="deleteAction" class="btn btn-block btn-danger btn-cons m-b-10"><i class="fas fa-trash"></i> Yes Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- /.Delete Modal --}}
@endsection

@section('script')
    @include('app.material_request.home.scripts.index')
@endsection
