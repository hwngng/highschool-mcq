<?php
namespace App\Business;

use App\DAL\ClassDAL;
use App\DAL\SchoolDAL;

class ClassBus extends BaseBus
{
	private $ClassDAL;

	private function getClassDAL ()
	{
		if (!$this->ClassDal) {
			$this->ClassDAL = new ClassDAL();
		}
		return $this->ClassDAL;
	}

    public function getAll ()
	{
		return $this->getClassDAL()->getAll();
	}


}
