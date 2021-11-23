<?php

namespace App\Traits\JenisPengadaan;

/* Models */
use App\Models\JenisPengadaan;

use DB;

trait JenisPengadaanCollection
{
    public function __construct()
    {
        $this->JenisPengadaanModel = JenisPengadaan::class;
        $this->JenisPengadaanTable = getTable($this->JenisPengadaanModel);
    }

    public function GetJenisPengadaanDetails($JenisPengadaans)
    {
        $JenisPengadaanID = $JenisPengadaans->pluck('id');

        $JenisPengadaans->map(function($JenisPengadaan) {
            return $JenisPengadaan;
        });
        return $JenisPengadaans;
    }

}
