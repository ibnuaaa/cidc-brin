<?php

namespace App\Traits\Ppk;

/* Models */
use App\Models\Ppk;

use DB;

trait PpkCollection
{
    public function __construct()
    {
        $this->PpkModel = Ppk::class;
        $this->PpkTable = getTable($this->PpkModel);
    }

    public function GetPpkDetails($Ppks)
    {
        $PpkID = $Ppks->pluck('id');

        $Ppks->map(function($Ppk) {
            return $Ppk;
        });
        return $Ppks;
    }

}
