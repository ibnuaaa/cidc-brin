<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaterialRequest extends Model
{
    use SoftDeletes;
    protected $table = 'material_request';

    public function material_request_item()
    {
        return $this->hasMany(MaterialRequestItem::class, 'material_request_id', 'material_request.id')
            ->with('material')
            ->with('distributor')
            ->with('material_distributor')
            ->with('distributor_rujukan')
            ;
    }

    public function distributor()
    {
        return $this->hasOne(Distributor::class, 'id', 'material_request.distributor_id');
    }

    public function pj_logistik_produksi()
    {
        return $this->hasOne(User::class, 'id', 'material_request.pj_logistik_produksi_user_id');
    }

    public function pj_logistik_produksi2()
    {
        return $this->hasOne(User::class, 'id', 'pj_logistik_produksi_user_id');
    }

    public function kepala_instalasi_farmasi()
    {
        return $this->hasOne(User::class, 'id', 'material_request.kepala_instalasi_farmasi_user_id');
    }

    public function ppk()
    {
        return $this->hasOne(User::class, 'id', 'material_request.ppk_user_id');
    }

    public function status_alokasi_user()
    {
        return $this->hasOne(User::class, 'id', 'material_request.status_alokasi_by');
    }

    public function status_alokasi_user2()
    {
        return $this->hasOne(User::class, 'id', 'status_alokasi_by');
    }


}
