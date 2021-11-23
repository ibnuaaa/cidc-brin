<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReceiveRequest extends Model
{
    use SoftDeletes;
    protected $table = 'receive_request';

    public function receive_request_item()
    {
        return $this->hasMany(ReceiveRequestItem::class, 'receive_request_id', 'receive_request.id')
            ->with('purchase_order_item')
            ->with('material');
    }

    public function receive_request_item2()
    {
        return $this->hasMany(ReceiveRequestItem::class, 'receive_request_id', 'id');
    }



}
