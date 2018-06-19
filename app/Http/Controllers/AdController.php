<?php

namespace AD2018\Http\Controllers;

use AD2018\Http\Services\AdService;
use AD2018\Model\Inventory;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function __construct(AdService $adService)
    {
        $this->adService = $adService;
    }

    public function getAd(Request $request, $inventoryId) {
        return response()->json($this->adService->getAd($inventoryId), 200, [], JSON_UNESCAPED_SLASHES);
    }

    public function getAd204(Request $request) {
        $inventoryId = $request->input("ownerid");
        return $this->adService->getAd($inventoryId);
    }
}
