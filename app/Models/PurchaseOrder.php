<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrder extends Model
{
    use SoftDeletes;
    protected $table = 'purchase_order';

    public function purchase_order_item()
    {
        return $this->hasMany(PurchaseOrderItem::class, 'purchase_order_id', 'purchase_order.id')
        ->with('receive_request_item')
        ->with('receive_request_item_approved')
        ->with('kontrak_payung_item')
        ->with('material');
    }

    public function receive_request()
    {
        return $this->hasMany(ReceiveRequest::class, 'purchase_order_id', 'purchase_order.id');
    }

    public function distributor()
    {
        return $this->hasOne(Distributor::class, 'id', 'purchase_order.distributor_id');
    }

    public function pj_logistik_produksi()
    {
        return $this->hasOne(User::class, 'id', 'purchase_order.pj_logistik_produksi_user_id');
    }

    public function kepala_instalasi_farmasi()
    {
        return $this->hasOne(User::class, 'id', 'purchase_order.kepala_instalasi_farmasi_user_id');
    }

    public function ppk()
    {
        return $this->hasOne(User::class, 'id', 'purchase_order.ppk_user_id');
    }

    public function material_request()
    {
        return $this->hasOne(MaterialRequest::class, 'id', 'purchase_order.material_request_id')->with('status_alokasi_user2')->with('pj_logistik_produksi2');
    }


}
