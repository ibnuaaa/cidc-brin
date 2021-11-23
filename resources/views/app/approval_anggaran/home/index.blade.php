@extends('layout.app')

@section('title', 'Approval Anggaran')
@section('bodyClass', 'fixed-header menu-pin menu-behind')

@section('content')
    <div class="container-fluid container-fixed-lg">

        <div class="card card-white">
            <div class="card-header ">
                <div class="card-title">Approval Anggaran Data</div><br>
            </div>
            <div class="card-body">
                @component('components.table', ['data' => $data, 'props' => []])
                    @scopedslot('head', ($item))
                        @if($item->name === 'No')
                            <th style="width: 5%">{{ $item->name }}</th>
                        @elseif($item->name === 'action')
                            <th style="width: 10%">{{ $item->name }}</th>
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
                            <td class="v-align-middle ">
                                @if ($item->status_alokasi == '')
                                <label class="label label-warning">
                                    Menunggu Persetujuan
                                </label>
                                @elseif ($item->status_alokasi == 'tersedia')
                                <label class="label label-success">
                                    Tersedia
                                </label>
                                @elseif ($item->status_alokasi == 'tidak_tersedia')
                                <label class="label label-danger">
                                    Tidak Tersedia
                                </label>
                                @endif
                            </td>

                            <td class="v-align-middle">

                                <div class="btn-group m-t-10">
                                    <a href="{{ url('/approval_anggaran/'.$item->id) }}" class="btn btn-primary btn-xs">
                                        Detail
                                    </a>
                                </div>


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
    @include('app.approval_anggaran.home.scripts.index')
@endsection
