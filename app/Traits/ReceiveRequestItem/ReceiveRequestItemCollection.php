<?php

namespace App\Traits\ReceiveRequestItem;

/* Models */
use App\Models\ReceiveRequestItem;

use DB;

trait ReceiveRequestItemCollection
{
    public function __construct()
    {
        $this->ReceiveRequestItemModel = ReceiveRequestItem::class;
        $this->ReceiveRequestItemTable = getTable($this->ReceiveRequestItemModel);
    }

    public function GetReceiveRequestItemDetails($ReceiveRequestItems)
    {
        $ReceiveRequestItemID = $ReceiveRequestItems->pluck('id');

        $ReceiveRequestItems->map(function($ReceiveRequestItem) {
            return $ReceiveRequestItem;
        });
        return $ReceiveRequestItems;
    }

}
