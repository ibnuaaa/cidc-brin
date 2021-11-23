<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class KontrakPayung extends Model
{
    use SoftDeletes;
    protected $table = 'kontrak_payung';

    public function kontrak_payung_item()
    {
        return $this->hasMany(KontrakPayungItem::class, 'kontrak_payung_id', 'kontrak_payung.id');
    }

    public function distributor()
    {
        return $this->hasOne(Distributor::class, 'id', 'kontrak_payung.distributor_id');
    }

    public function distributor_rujukan()
    {
        return $this->hasOne(Distributor::class, 'id', 'kontrak_payung.distributor_rujukan_id');
    }

    public function distributor_rujukan2()
    {
        return $this->hasOne(Distributor::class, 'id', 'distributor_rujukan_id');
    }

    public function ppk()
    {
        return $this->hasOne(User::class, 'id', 'kontrak_payung.ppk_user_id');
    }

    public function kontrak_payung_approval_user()
    {
        return $this->hasOne(User::class, 'id', 'kontrak_payung.kontrak_payung_approve_user_id');
    }

    public function jenis_pengadaan()
    {
        return $this->hasOne(JenisPengadaan::class, 'id', 'kontrak_payung.jenis_pengadaan_id');
    }

    public function jenis_pengadaan2()
    {
        return $this->hasOne(JenisPengadaan::class, 'id', 'jenis_pengadaan_id');
    }
}
