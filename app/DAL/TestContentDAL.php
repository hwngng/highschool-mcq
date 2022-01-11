<?php 
namespace App\DAL;

use ReturnMsg;
use App\DAL\BaseDAL;
use App\Common\ApiResult;
use App\Models\TestContent;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class TestContentDAL extends BaseDAL
{
	public function insertMany ($testContents)
	{
		$ret = new ApiResult();
		try
		{
			$result = TestContent::insert($testContents);
			if ($result)
				$ret->fill('0', 'Success.');
			else
				$ret->fill('1', 'Cannot insert, database error.');
		}
		catch (\Exception $e)
		{
			Log::error($e->__toString());
		}
		return $ret;
	}

	public function delete($testId) {
		$ret = new ApiResult();
		try
		{
			$result = TestContent::where('test_id', $testId)->delete();

			if ($result)
				$ret->fill('0', 'Success.');
			else
				$ret->fill('1', 'Cannot insert, database error.');
		}
		catch (\Exception $e)
		{
			Log::error($e->__toString());
		}
		return $ret;
	}

	public function removeQuestion($questionId) {
		$ret = new ApiResult();
		try
		{
			$result = TestContent::where('question_id', $questionId)->delete();

			if ($result)
				$ret->fill('0', 'Success.');
			else
				$ret->fill('1', 'Cannot insert, database error.');
		}
		catch (\Exception $e)
		{
			Log::error($e->__toString());
		}
		return $ret;
	}
}