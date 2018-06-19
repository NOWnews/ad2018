<?php

namespace AD2018\Http\Services;

use AD2018\Model\Creative;
use AD2018\Model\Inventory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class AdService
{
    public function __construct()
    {

    }

    private function adFactory ($creative) {
        if ($creative == []) return $creative;
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

        $creatives = Cache::get('ads/' . $inventoryId);

        if (!$creatives) {
            $inventory = Inventory::where(['id' => $inventoryId])->get()->first();
            $creatives = $inventory->creatives->filter(function ($value) {
                $res = false;
                if ($value->status) {
                    foreach ($value->queues as $queue){
                        $startTime = new Carbon($queue->start_time, "Asia/Taipei");
                        $endTime = new Carbon($queue->end_time, "Asia/Taipei");
                        $now = new Carbon();
                        if ($startTime<=$now && $endTime>=$now){
                            return true;
                        }
                    }

                }
                return $res;
            });

            Cache::put('ads/' . $inventoryId, $creatives, env('AD_CACHE_TIME', 5));
        }


        $creative = count($creatives) > 0 ? $creatives->random() : [];

        return $this->adFactory($creative);
    }


}
