<?php

namespace App\Traits\KontrakPayung;

/* Models */
use App\Models\KontrakPayung;

use DB;

trait KontrakPayungCollection
{
    public function __construct()
    {
        $this->KontrakPayungModel = KontrakPayung::class;
        $this->KontrakPayungTable = getTable($this->KontrakPayungModel);
    }

    public function GetKontrakPayungDetails($KontrakPayungs)
    {
        $KontrakPayungID = $KontrakPayungs->pluck('id');

        $KontrakPayungs->map(function($KontrakPayung) {
            return $KontrakPayung;
        });
        return $KontrakPayungs;
    }

}
