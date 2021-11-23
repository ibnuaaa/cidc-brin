<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class XocpInvStockHistoryExtended extends Model
{
    public $timestamps = false;

    protected $connection = 'mysql2';

    protected $table = 'inv_stock_history_extended';
}
