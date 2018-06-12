<?php

namespace AD2018\Http\Services;

use AD2018\Model\Creative;
use AD2018\Model\Inventory;
use Illuminate\Support\Facades\Storage;

class AdService
{
    public function __construct()
    {

    }

    public function getAd ($inventoryId) {
        $inventory = Inventory::where(['id' => $inventoryId])->get()->first();
        $creatives = $inventory->creatives;
        $creative = $creatives->random();

        return $creatives->random();
    }


}
