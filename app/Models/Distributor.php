<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Distributor extends Model
{
    use SoftDeletes;
    protected $table = 'distributor';

    public function material_distributor()
    {
        return $this->hasMany(MaterialDistributor::class, 'distributor_id', 'distributor.id')
        ->with('material');
    }
}
