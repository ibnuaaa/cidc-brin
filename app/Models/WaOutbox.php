<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class WaOutbox extends Model
{
    public $timestamps = false;

    public $primaryKey  = 'NOMOR';

    protected $connection = 'mysql3';

    protected $table = 'wa_outbox';
}
