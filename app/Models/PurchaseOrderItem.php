<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrderItem extends Model
{
    use SoftDeletes;
    protected $table = 'purchase_order_item';

    public function material()
    {
        return $this->hasOne(Material::class, 'id', 'material_id');
    }

    public function receive_request_item()
    {
        return $this->hasMany(ReceiveRequestItem::class, 'purchase_order_item_id', 'id');
    }

    public function receive_request_item_approved()
    {
        return $this->hasMany(ReceiveRequestItem::class, 'purchase_order_item_id', 'id')
            ->join('receive_request','receive_request.id' , '=', 'receive_request_item.receive_request_id')
            ->where('receive_request.approval_status', 'approved')
        ;
    }

    public function kontrak_payung_item()
    {
        return $this->hasOne(KontrakPayungItem::class, 'id', 'kontrak_payung_item_id')->with('kontrak_payung');
    }

    public function kontrak_payung_item2()
    {
        return $this->hasOne(KontrakPayungItem::class, 'id', 'purchase_order_item.kontrak_payung_item_id')->with('kontrak_payung');
    }

    public function distributor_rujukan()
    {
        return $this->hasOne(Distributor::class, 'id', 'purchase_order_item.distributor_rujukan_id');
    }
}
