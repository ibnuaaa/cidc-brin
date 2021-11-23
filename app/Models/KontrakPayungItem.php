<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class KontrakPayungItem extends Model
{
    use SoftDeletes;
    protected $table = 'kontrak_payung_item';

    public function kontrak_payung()
    {
        return $this->hasOne(KontrakPayung::class, 'id', 'kontrak_payung_id')
        ->with('distributor_rujukan2')
        ->with('jenis_pengadaan2');
    }
}
