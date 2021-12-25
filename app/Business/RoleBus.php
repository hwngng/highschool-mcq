<?php
namespace App\Business;

use App\DAL\RoleDAL;

class RoleBus extends BaseBus
{
	private $roleDAL;

	public function __construct()
	{
		$this->roleDAL = new RoleDAL();
	}

	private function getRoleDAL ()
	{
		return $this->roleDAL;
	}

    public function getAll ()
	{
		return $this->roleDAL->getAll();
	}


}
