<?php
namespace App\Business;

use App\DAL\GradeDAL;

class GradeBus extends BaseBus
{
	private $gradeDAL;

	private function getGradeDAL ()
	{
		if (!$this->gradeDAL) {
			$this->gradeDAL = new GradeDAL();
		}
		return $this->gradeDAL;
	}

	public function getAllId ()
	{
		return $this->getGradeDAL()->getAllId();
	}

}
