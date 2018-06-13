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

    private function adFactory ($creative) {
        $ad = [
            "title" => $creative["title"],
            "url" => $creative["link"],
        ];

        if ($creative["image"]) {
            $ad['image'] = $creative["image"];
        }

        return $ad;
    }

    public function getAd ($inventoryId) {

        $inventory = Inventory::where(['id' => $inventoryId])->get()->first();
        $creatives = $inventory->creatives;
        $creative = $creatives->random();

        return $this->adFactory($creatives->random());
    }


}
