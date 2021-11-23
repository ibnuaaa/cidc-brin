<?php

namespace App\Traits\Distributor;

/* Models */
use App\Models\Distributor;

use DB;

trait DistributorCollection
{
    public function __construct()
    {
        $this->DistributorModel = Distributor::class;
        $this->DistributorTable = getTable($this->DistributorModel);
    }

    public function GetDistributorDetails($Distributors)
    {
        $DistributorID = $Distributors->pluck('id');

        $Distributors->map(function($Distributor) {
            return $Distributor;
        });
        return $Distributors;
    }

}
