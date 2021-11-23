<?php

namespace App\Traits\PurchaseOrder;

/* Models */
use App\Models\PurchaseOrder;

use DB;

trait PurchaseOrderCollection
{
    public function __construct()
    {
        $this->PurchaseOrderModel = PurchaseOrder::class;
        $this->PurchaseOrderTable = getTable($this->PurchaseOrderModel);
    }

    public function GetPurchaseOrderDetails($PurchaseOrders)
    {
        $PurchaseOrderID = $PurchaseOrders->pluck('id');

        $PurchaseOrders->map(function($PurchaseOrder) {
            return $PurchaseOrder;
        });
        return $PurchaseOrders;
    }

}
