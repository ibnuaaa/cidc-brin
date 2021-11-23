<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class XocpInvStockStatus extends Model
{
    public $timestamps = false;

    public $primaryKey  = 'obj_id';

    protected $connection = 'mysql2';

    protected $table = 'inv_stock_status';
}
