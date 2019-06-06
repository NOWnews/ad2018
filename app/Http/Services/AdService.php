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
        $host =request()->getHttpHost();
        $ad = [
            "title" => $creative["title"],
            "url" => $creative["link"],
        ];

        if ($creative["image"]) {
            $ad['img'] = "https://imagelab.nownews.com/?w=220&q=80&src=https://" . $host . $creative["image"];
        }

        return $ad;
    }

    public function getAd ($inventoryId) {
        $creative = Cache::get('ads/' . $inventoryId);

        if (!$creative) {
            $inventory = Inventory::where(['id' => $inventoryId])->get()->first();
            $creatives = array_get($inventory, 'creatives', []);
            if ($creatives) {
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

                $creatives = $creatives->map(function ($creative) {
                    return $this->adFactory($creative);
                });
                
                $creative = count($creatives) > 0 ? $creatives->random() : [];

                Cache::put('ads/' . $inventoryId, $creative, env('AD_CACHE_TIME', 30));
            }
        }

        return $creative;
    }

    public function getAds ($inventoryIds) {
        $creatives = [];
        foreach ($inventoryIds as $inventoryId){
            $creatives[$inventoryId] = $this->getAd($inventoryId);
        }
        return $creatives;
    }

}
