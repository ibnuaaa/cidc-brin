@extends('layout.app')

@section('title', 'Information')
@section('bodyClass', 'fixed-header menu-pin menu-behind')

@section('content')
    <div class="container-fluid container-fixed-lg">
        <div class="card card-white">
            <div class="card-header ">
                <div class="card-title">Penerimaan Barang Data</div><br>
            </div>
            <div class="card-body">
                @component('components.table', ['data' => $data, 'props' => []])
                    @scopedslot('head', ($item))
                        @if($item->name === 'No')
                            <th style="width: 6%">{{ $item->name }}</th>
                        @elseif($item->name === 'action')
                            <th style="width: 20%">{{ $item->name }}</th>
                        @elseif($item->name === 'Status')
                            <th style="width: 10%">{{ $item->name }}</th>
                        @else
                            <th style="width: 112px">{{ $item->name }}</th>
                        @endif
                    @endscopedslot
                    @scopedslot('record', ($item, $props, $number))
                        <tr>
                            <td class="v-align-top " rowspan="2">
                                <p>{{ $number }}</p>
                            </td>
                            <td class="v-align-middle ">
                                <p>{{ $item->name }}</p>
                            </td>
                            <td class="v-align-middle ">
                                <p>{{ $item->nomor }}</p>
                            </td>
                            <td class="v-align-middle ">
                                <p>{{ !empty($item->purchase_order_item[0]->kontrak_payung_item->kontrak_payung->distributor_rujukan2->name) ? $item->purchase_order_item[0]->kontrak_payung_item->kontrak_payung->distributor_rujukan2->name : '' }}</p>
                            </td>
                            <td class="v-align-middle ">
                                <p>{{ $item->ppk_approve_at }}</p>
                            </td>
                            <td class="v-align-middle ">
                                <p>123123</p>
                            </td>

                            <td class="v-align-middle ">
                                @if ($item->receive_status == '')
                                <label class="label">Pending</label>
                                @elseif ($item->receive_status == 'partial')
                                <label class="label label-warning">Diterima Sebagian</label>
                                @elseif ($item->receive_status == 'received')
                                <label class="label label-success">Diterima</label>
                                @else
                                <label class="label label-danger">{{$item->receive_status}}</label>
                                @endif
                            </td>
                            <td class="v-align-middle">
                                <div class="btn-group">
                                    <a href="{{ url('/receive_request/'.$item->id) }}" class="btn btn-warning btn-xs">
                                        Detail
                                    </a>
                                    @if (!in_array($item->receive_status, ['received', 'expired', 'partial_expired']))
                                    <a onClick="return buatPenerimaan('{{$item->id}}')" class="btn btn-success btn-xs text-white">
                                        Buat Penerimaan
                                    </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                @if (!empty($item->receive_request))
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                                No
                                            </td>
                                            <td>
                                                Tanggal Dibuat
                                            </td>
                                            <td>
                                                Status
                                            </td>
                                            <td>
                                                Aksi
                                            </td>
                                        </tr>
                                        <?php foreach ($item->receive_request as $key2 => $val2): ?>
                                            <tr>
                                                <td>
                                                    {{ $key2+1 }}
                                                </td>
                                                <td>
                                                    {{ $val2->created_at }}
                                                </td>
                                                <td>
                                                    @if ($val2->approval_status == '')
                                                    <label class="label">Pending</label>
                                                    @elseif ($val2->approval_status == 'approved')
                                                    <label class="label label-success">Diterima</label>
                                                    @elseif ($val2->approval_status == 'rejected')
                                                    <label class="label label-danger">Ditolak</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/receive_request/edit_item/{{ $val2->id }}" class="btn btn-primary text-white"> Detail Penerimaan</a>
                                                    <a href="/receive_request/cetak_bap/{{ $val2->id }}" class="btn btn-primary text-white"> Cetak BAP</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
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
    @include('app.receive_request.home.scripts.index')
@endsection
