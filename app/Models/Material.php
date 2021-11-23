<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use SoftDeletes;
    protected $table = 'material';

    public function ehr_oj_inv()
    {
        return $this->hasOne(XocpInvObj::class, 'obj_id', 'obj_id');
    }
}
