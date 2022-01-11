<?php 
namespace App\Business;

use App\DAL\TestContentDAL;

class TestContentBus extends BaseBus
{
	private $testContentDAL;

	private function getTestContentDAL ()
	{
		if (!$this->testContentDAL) {
			$this->testContentDAL = new TestContentDAL();
		}
		return $this->testContentDAL;
	}



	public function insertMany ($testId, $testCode, $questionIds)
	{
		$len = 0;
		$testContents = [];
		foreach ($questionIds as $questionId)
		{
			if (!empty($questionId))
			{
				$testContents[$len]['test_id'] = $testId;
				$testContents[$len]['test_code'] = $testCode;
				$testContents[$len]['question_id'] = $questionId;
			}

			++$len;
		}
		app('debugbar')->info($testContents);

		return $this->getTestContentDAL()->insertMany($testContents);
	}	

	public function updateForTest($testId, $testContent) {
		$apiResult = $this->getTestContentDAL()->delete($testId);
		$apiResult = $this->insertMany($testId, '0' ,$testContent);
		return $apiResult;
	}


	public function removeQuestion($questionId) {
		$apiResult = $this->getTestContentDAL()->removeQuestion($questionId);
		return $apiResult;
	}
}