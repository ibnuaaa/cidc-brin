<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class XocpInvStockHistorySeq extends Model
{
    public $timestamps = false;

    public $primaryKey  = 'history_no';

    protected $connection = 'mysql2';

    protected $table = 'inv_stock_history_seq';
}
