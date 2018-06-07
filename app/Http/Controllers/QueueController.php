<?php

namespace AD2018\Http\Controllers;

use AD2018\Http\Services\QueueService;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    public function __construct(QueueService $queueService)
    {
        $this->middleware('auth');
        $this->queueService = $queueService;
    }

    public function createQueue(Request $request) {
        $param = $request->input();
        $result = $this->queueService->createQueue($param);
        if ($result === true) {
            return redirect()->back();
        } else {
            $errorMsg = '發生錯誤：'.$result->getMessage();
            return redirect()->back()->withErrors([$errorMsg])->withInput();
        }
    }

    public function deleteQueue(Request $request, $id) {
        $result = $this->queueService->deleteQueue($id);
        if ($result === 1) {
            return redirect()->back();
        } else {
            $errorMsg = '發生錯誤：'.$result->getMessage();
            return redirect()->back()->withErrors([$errorMsg])->withInput();
        }
    }
}
