<?php

namespace App\Business;

use App\Business\BaseBus;
use App\Business\GradeBus;
use App\Business\SchoolBus;
use App\DAL\UserDAL;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserBus extends BaseBus
{
    private $userDAL;
    private $gradeBus;
    private $schoolBus;
    private $roleBus;

    private function getUserDAL()
    {
        if (!$this->userDAL) {
            $this->userDAL = new UserDAL();
        }
        return $this->userDAL;
    }

    private function getGradeBus()
    {
        if (!$this->gradeBus) {
            $this->gradeBus = new GradeBus();
        }
        return $this->gradeBus;
    }

    private function getSchoolBus()
    {
        if (!$this->schoolBus) {
            $this->schoolBus = new SchoolBus();
        }
        return $this->schoolBus;
    }

    private function getRoleBus()
    {
        if (!$this->roleBus) {
            $this->roleBus = new RoleBus();
        }
        return $this->roleBus;
    }

    public function getAllForAdmin()
    {
        $apiResult = $this->getUserDAL()->getAllForAdmin();
        $apiResult->grades = $this->getGradeBus()->getAllId()->grades;
        $apiResult->schools = $this->getSchoolBus()->getAll()->schools;
        $apiResult->roles = $this->getRoleBus()->getAll()->roles;

        return $apiResult;
    }

    public function getById($id)
    {
        $apiResult = $this->getUserDAL()->getById($id);

        return $apiResult;
    }



    /**
     * insert
     *
     * @param  array $user
     * @return \App\Common\ApiResult
     */
    public function insert($user)
    {
        $user['password'] = Hash::make($user['password']);
        $apiResult = $this->getUserDAL()->insert($user);

        return $apiResult;
    }

    public function update($user)
    {
        $apiResult = $this->getUserDAL()->update($user);

        return $apiResult;
    }

    public function destroy($userId)
    {
        return $this->getUserDAL()->destroy($userId);
    }
}
