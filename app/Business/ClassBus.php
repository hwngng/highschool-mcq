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
    public function insert($class)
	{
		$apiResult = $this->getClassDAL()->insert($class);

		return $apiResult;
	}
    public function getByCurrentUserId(){
        return $this->getClassDAL()->getByCurrentUserId();
    }
    public function memberJoin($memberId,$id,$code){
        return $this->getClassDAL()->memberJoin($memberId,$id,$code);
    }
    public function insertTests($classId,$testIds)
	{
		$apiResult = $this->getClassDAL()->insertTests($classId,$testIds);
		return $apiResult;
	}
	public function removeMember($id,$memberId) {
		return $this->getClassDAL()->removeMember($id,$memberId);
	}

}
