<?php

namespace App\DAL;

use ReturnMsg;
use App\DAL\BaseDAL;
use App\Models\School;
use App\Common\ApiResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SchoolDAL extends BaseDAL
{
    public function getAll()
    {
        $apiResult = new ApiResult();
        $apiResult->schools = School::select('id', 'name', 'address')->get();
        return $apiResult;
    }
    public function getById($id)
    {
        $ret = new ApiResult();
		try {
			$ret->school = School::where('id', $id)
								->first();
		} catch (\Exception $e) {
			Log::error($e->__toString());
		}
		return $ret;
    }
}
