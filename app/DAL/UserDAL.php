<?php

namespace App\DAL;

use App\Common\ApiResult;
use App\DAL\BaseDAL;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserDAL extends BaseDAL
{
    public function getAllForAdmin()
    {
        $apiResult = new ApiResult();

        $apiResult->users = User::select('id',
            'username',
            'email',
            'last_name',
            'first_name',
            'grade_id',
            'school_id',
            'mobile_phone',
            'telephone')
            ->with('roles:id,name')
            ->with('school:id,name')
            ->orderBy('updated_at', 'desc')
            ->get();

        return $apiResult;
    }

    public function getById($id)
    {
        $apiResult = new ApiResult();
        $apiResult->user = User::select('id',
            'username',
            'avatar',
            'email',
            'last_name',
            'first_name',
            'birthdate',
            'address',
            'grade_id',
            'school_id',
            'mobile_phone',
            'telephone')
            ->with('roles:id')
            ->where('id', $id)
            ->first();

        return $apiResult;
    }

    public function insert($user)
    {
        $ret = new ApiResult();

        $userORM = new User();
        $userORM->first_name = $user['first_name'];
        $userORM->last_name = $user['last_name'];
        $userORM->username = $user['username'];
        $userORM->password = $user['password'];
        $userORM->grade_id = $user['grade_id'];
        $userORM->school_id = $user['school_id'];
        $userORM->email = $user['email'];
        $userORM->birthdate = $user['birthdate'];
        $userORM->mobile_phone = $user['mobile_phone'];
        $userORM->telephone = $user['telephone'];
        $userORM->address = $user['address'];
        $userORM->parent_name = $user['parent_name'];
        $userORM->parent_phone = $user['parent_phone'];
        $userORM->avatar = $user['avatar'];

        $result = $userORM->save();
        $userORM->roles()->sync($user['roles']);

        if ($result) {
            $ret->fill('0', 'Success');
            $ret->userId = $userORM->id;
        } else {
            $ret->fill('1', 'Cannot insert, database error.');
        }

        return $ret;
    }

    public function update($user)
    {
        $ret = new ApiResult();
        try {
            if (isset($user['id'])) {
                $userORM = User::find($user['id']);

                if (isset($user['avatar'])) {
                    $userORM->avatar = $user['avatar'];
                }

                if (isset($user['first_name'])) {
                    $userORM->first_name = $user['first_name'];
                }

                if (isset($user['last_name'])) {
                    $userORM->last_name = $user['last_name'];
                }

                if (isset($user['email'])) {
                    $userORM->email = $user['email'];
                }

                if (isset($user['address'])) {
                    $userORM->address = $user['address'];
                }

                if (isset($user['school_id'])) {
                    $userORM->school_id = $user['school_id'];
                }

                if (isset($user['roles'])) {
                    $userORM->roles()->sync($user['roles']);
                }

                if (isset($user['grade_id'])) {
                    $userORM->grade_id = $user['grade_id'];
                }

                if (isset($user['birthdate'])) {
                    $userORM->birthdate = $user['birthdate'];
                }

                if (isset($user['telephone'])) {
                    $userORM->telephone = $user['telephone'];
                }

                if (isset($user['mobile_phone'])) {
                    $userORM->mobile_phone = $user['mobile_phone'];
                }

                $result = $userORM->save();

                $ret->fill('0', 'Success.');
                $ret->affectedRows = $result;
            } else {
                $ret->fill('1', 'Uninitialized user ID.');
            }
        } catch (\Exception $e) {
            $ret->fill($e->getCode(), $e->getMessage());
            // log smth
        }
        return $ret;
    }

    public function destroy($id)
    {
        $ret = new ApiResult();
        try {
            $user = User::find($id);
            if (isset($user->id)) {
                $user->deleted_by = Auth::id();
                $user->deleted_at = date('Y-m-d h:i:s');
                $result = $user->save();
                if ($result == 1) {
                    $ret->fill('0', 'Success');
                } else {
                    $ret->fill('1', 'Something went wrong');
                }
                $ret->affectedRows = $result;
            }
        } catch (\Exception $e) {
            $ret->fill($e->getCode(), $e->getMessage());
            // log smth
        }
        return $ret;
    }

    public function restore($id)
    {
        $ret = new ApiResult();
        try {
            $user = User::onlyTrashed()->find($id);
            $user->deleted_by = null;
            $user->deleted_at = null;
            $result = $user->save();

            $ret->fill('0', 'Success.');
            $ret->affectedRows = $result;
        } catch (\Exception $e) {
            $ret->fill($e->getCode(), $e->getMessage());
            // log smth
        }
        return $ret;
    }
}
