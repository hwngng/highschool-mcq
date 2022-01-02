<?php
namespace App\DAL;

use App\DAL\BaseDAL;
use App\Common\Helper;
use App\Models\Lop;
use App\Common\ApiResult;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ClassDAL extends BaseDAL
{
	public function getAll ()
	{
		$ret = new ApiResult();
		try {
			$ret->classes = Lop::select('id',
										'content',
										'grade_id',
										'subject_id')
								->with('subject:id,name')
								->get();
		} catch (\Exception $e) {
			Log::error($e->__toString());
		}

		return $ret;
	}

	public function getById ($id)
	{
		$ret = new ApiResult();
		try {
			$ret->question = Lop::select('id',
										'content',
										'subject_id',
										'grade_id',
										'solution')
								->where('id', $id)
								->with('choices:id,question_id,content,is_solution')
								->first();
		} catch (\Exception $e) {
			Log::error($e->__toString());
		}
		return $ret;
	}
}
