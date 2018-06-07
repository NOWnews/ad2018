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
        $endTime = new Carbon($endTime, 'Asia/Taipei');
        $endTime->addDay(1);
        $startTime = new Carbon($startTime, 'Asia/Taipei');
        return ($startTime < $endTime);
    }

    public function createQueue ($param) {
        $startTime = $param['startTime'];
        $endTime = $param['endTime'];
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
