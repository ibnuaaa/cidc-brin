<?php

namespace App\Traits\PurchaseOrderItem;

/* Models */
use App\Models\PurchaseOrderItem;

use DB;

trait PurchaseOrderItemCollection
{
    public function __construct()
    {
        $this->PurchaseOrderItemModel = PurchaseOrderItem::class;
        $this->PurchaseOrderItemTable = getTable($this->PurchaseOrderItemModel);
    }

    public function GetPurchaseOrderItemDetails($PurchaseOrderItems)
    {
        $PurchaseOrderItemID = $PurchaseOrderItems->pluck('id');

        $PurchaseOrderItems->map(function($PurchaseOrderItem) {
            return $PurchaseOrderItem;
        });
        return $PurchaseOrderItems;
    }

}
