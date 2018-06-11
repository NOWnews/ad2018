<?php

namespace AD2018\Http\Services;

use AD2018\Model\Queue;
use Carbon\Carbon;

class QueueService
{
    public function __construct()
    {

    }

    private function checkDate ($startTime, $endTime) {
        return ($startTime < $endTime);
    }

    public function createQueue ($param) {
        $startTime = $param['startTime'];
        $endTime = $param['endTime'];
        $startTime = new Carbon($startTime, 'Asia/Taipei');
        $endTime = new Carbon($endTime, 'Asia/Taipei');
        // 10/10 結束 == 10/11 凌晨 0.0 結束
        $endTime->addDay(1);
        if ($this->checkDate($startTime, $endTime)) {
            $queue = new Queue();
            $queue->creative_id = $param['creativeId'];
            $queue->start_time = $startTime;
            $queue->end_time = $endTime;
            try{
                $result = $queue->save();
                return $result;
            } catch (\Exception $exception) {
                return $exception;
            }
        } else {
            return new \Exception("結束時間要在開始時間之後");
        }
    }

    public function deleteQueue ($id) {
        try{
            $result = Queue::destroy($id);
            return $result;
        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
