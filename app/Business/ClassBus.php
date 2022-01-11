<?php

namespace App\Business;

use App\DAL\ClassDAL;
use App\DAL\UserDAL;

class ClassBus extends BaseBus
{
    private $classDAL;
    private $userDAL;

    private function getClassDAL()
    {
        if (!$this->classDAL) {
            $this->classDAL = new ClassDAL();
        }
        return $this->classDAL;
    }

    private function getUserDAL()
    {
        if (!$this->userDAL) {
            $this->userDAL = new UserDAL();
        }
        return $this->userDAL;
    }
    public function getAll ()
	{
		return $this->getClassDAL()->getAll();
	}
    public function getUserById($id)
    {
        return $this->getClassDAL()->getUsersByClassId($id);
    }
    public function getTestsById($id)
    {
        $tests = $this->getClassDAL()->getTestsByClassId($id)->tests;
        foreach ($tests as $test) {
            $test->p_created_by = $this->getUserDAL()->getById($test->p_created_by)->user;
        }
        return $tests;
    }
	public function removeMember($id,$memberId) {
		return $this->getClassDAL()->removeMember($id,$memberId);
	}

}
