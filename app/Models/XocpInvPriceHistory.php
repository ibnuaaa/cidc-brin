<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class XocpInvPriceHistory extends Model
{
    public $timestamps = false;

    protected $connection = 'mysql2';

    protected $table = 'inv_price_history';
}
