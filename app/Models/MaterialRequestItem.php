<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaterialRequestItem extends Model
{
    use SoftDeletes;
    protected $table = 'material_request_item';

    public function material()
    {
        return $this->hasOne(Material::class, 'id', 'material_id');
    }

    public function distributor()
    {
        return $this->hasOne(Distributor::class, 'id', 'distributor_id');
    }

    public function distributor_rujukan()
    {
        return $this->hasOne(Distributor::class, 'id', 'distributor_rujukan_id');
    }

    public function material_distributor()
    {
        return $this->hasMany(MaterialDistributor::class, 'material_id', 'material_id')->with('distributor');
    }

    public function kontrak_payung_item()
    {
        return $this->hasOne(KontrakPayungItem::class, 'id', 'kontrak_payung_item_id')->with('kontrak_payung');
    }
}
