<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReceiveRequestItem extends Model
{
    use SoftDeletes;
    protected $table = 'receive_request_item';

    public function material()
    {
        return $this->hasOne(Material::class, 'id', 'material_id');
    }

    public function material_obj()
    {
        return $this->hasOne(Material::class, 'id', 'material_id')->with('ehr_oj_inv');
    }

    public function purchase_order_item()
    {
        return $this->hasOne(PurchaseOrderItem::class, 'id', 'purchase_order_item_id')->with('kontrak_payung_item');
    }
}
