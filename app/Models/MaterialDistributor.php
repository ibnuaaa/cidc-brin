<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaterialDistributor extends Model
{
    use SoftDeletes;
    protected $table = 'material_distributor';

    public function material()
    {
        return $this->hasOne(Material::class, 'id', 'material_id');
    }

    public function distributor()
    {
        return $this->hasOne(Distributor::class, 'id', 'distributor_id');
    }

}
