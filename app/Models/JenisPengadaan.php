<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisPengadaan extends Model
{
    use SoftDeletes;
    protected $table = 'jenis_pengadaan';

}
