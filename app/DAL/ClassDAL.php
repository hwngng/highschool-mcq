<?php

namespace App\DAL;

use ReturnMsg;
use App\DAL\BaseDAL;
use App\Models\Grade;
use App\Common\ApiResult;
use App\Models\Lop;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ClassDAL extends BaseDAL
{
    public function getUsersByClassId($id)
    {
        $apiResult = new ApiResult();
        try {
            $apiResult->class  = Lop::find($id);
            $apiResult->members  = $apiResult->class->members;
            foreach ($apiResult->members as $member) {
                $member->join_at = Carbon::parse($member->pivot->created_at)->diffForHumans();
            }
        } catch (\Exception $e) {
            Log::error($e->__toString());
        }
        return $apiResult;
    }
    public function getTestsByClassId($id)
    {
        $apiResult = new ApiResult();
        try {
            $apiResult->class  = Lop::find($id);
            $apiResult->tests  = $apiResult->class->tests;
            foreach ($apiResult->tests as $test) {
                $test->p_created_at = $test->pivot->created_at->diffForHumans();
                $test->p_start_at = Carbon::parse($test->pivot->start_at)->diffForHumans();
                $test->p_created_by = $test->pivot->created_by;
            }
        } catch (\Exception $e) {
            Log::error($e->__toString());
        }
        return $apiResult;
    }
}
