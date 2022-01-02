<?php

namespace App\Business;

use App\DAL\SchoolDAL;

class SchoolBus extends BaseBus
{
    private $schoolDAL;

    private function getSchoolDAL()
    {
        if (!$this->schoolDAL) {
            $this->schoolDAL = new SchoolDAL();
        }
        return $this->schoolDAL;
    }
    public function getSchoolById($id)
    {
        $apiResult = $this->getSchoolDAL()->getById($id);

		return $apiResult;
    }
    public function getAll()
    {
        return $this->getSchoolDAL()->getAll();
    }
}
