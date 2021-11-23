<?php

namespace App\Traits\Material;

/* Models */
use App\Models\Material;

use DB;

trait MaterialCollection
{
    public function __construct()
    {
        $this->MaterialModel = Material::class;
        $this->MaterialTable = getTable($this->MaterialModel);
    }

    public function GetMaterialDetails($Materials)
    {
        $MaterialID = $Materials->pluck('id');

        $Materials->map(function($Material) {
            return $Material;
        });
        return $Materials;
    }

}
