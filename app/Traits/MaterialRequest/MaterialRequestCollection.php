<?php

namespace App\Traits\MaterialRequest;

/* Models */
use App\Models\MaterialRequest;

use DB;

trait MaterialRequestCollection
{
    public function __construct()
    {
        $this->MaterialRequestModel = MaterialRequest::class;
        $this->MaterialRequestTable = getTable($this->MaterialRequestModel);
    }

    public function GetMaterialRequestDetails($MaterialRequests)
    {
        $MaterialRequestID = $MaterialRequests->pluck('id');

        $MaterialRequests->map(function($MaterialRequest) {
            return $MaterialRequest;
        });
        return $MaterialRequests;
    }

}
