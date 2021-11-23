<?php

namespace App\Traits\ReceiveRequest;

/* Models */
use App\Models\ReceiveRequest;

use DB;

trait ReceiveRequestCollection
{
    public function __construct()
    {
        $this->ReceiveRequestModel = ReceiveRequest::class;
        $this->ReceiveRequestTable = getTable($this->ReceiveRequestModel);
    }

    public function GetReceiveRequestDetails($ReceiveRequests)
    {
        $ReceiveRequestID = $ReceiveRequests->pluck('id');

        $ReceiveRequests->map(function($ReceiveRequest) {
            return $ReceiveRequest;
        });
        return $ReceiveRequests;
    }

}
