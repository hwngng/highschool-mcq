<?php

namespace App\DAL;

use App\DAL\BaseDAL;
use App\Models\Role;
use App\Common\ApiResult;

class RoleDAL extends BaseDAL
{
    public function getAll()
    {
        $apiResult = new ApiResult();
        
        $apiResult->roles = Role::select('id','name')->get();
        
        return $apiResult;
    }
}
