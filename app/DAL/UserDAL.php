<?php

namespace App\DAL;

use App\Common\ApiResult;
use App\DAL\BaseDAL;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Common\Helper;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

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
                                        ->orderBy('updated_at', 'desc')
                                        ->get();

        return $apiResult;
    }

    public function getById($id)
    {
        $apiResult = new ApiResult();
        try {
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
        } catch (\Exception $e) {
            Log::error($e->__toString());
        }
        return $apiResult;
    }

    public function insert($user)
    {
        $ret = new ApiResult();

        try {
            $userORM = new User();
            $userORM->first_name = $user['first_name'];
            $userORM->last_name = $user['last_name'];
            $userORM->username = $user['username'];
            $userORM->password = $user['password'];
            $userORM->grade_id = Helper::IssetTake($userORM->grade_id, $user, 'grade_id');
            $userORM->school_id = Helper::IssetTake($userORM->school_id, $user, 'school_id');
            $userORM->email = Helper::IssetTake($userORM->email, $user, 'email');
            $userORM->birthdate = Helper::IssetTake($userORM->birthdate, $user, 'birthdate');
            $userORM->mobile_phone = Helper::IssetTake($userORM->mobile_phone, $user, 'mobile_phone');
            $userORM->telephone = Helper::IssetTake($userORM->telephone, $user, 'telephone');
            $userORM->address = Helper::IssetTake($userORM->address, $user, 'address');
            $userORM->avatar = Helper::IssetTake($userORM->avatar, $user, 'avatar');

            $result = $userORM->save();
            $userORM->roles()->sync($user['roles']);

            if ($result) {
                $ret->fill('0', 'Success');
                $ret->user = $userORM;
            } else {
                $ret->fill('1', 'Cannot insert, database error.');
            }
        } catch (\Exception $e) {
            Log::error($e->__toString());
        }

        return $ret;
    }

    public function update($user)
    {
        $ret = new ApiResult();
        try {
            if (!isset($user['id'])) 
            {
                $ret->fill('1', 'Uninitialized user ID.');
                return $ret;
            }
            $userORM = User::find($user['id']);
            $userORM->avatar = Helper::IssetTake($userORM->avatar, $user, 'avatar');
            $userORM->first_name = Helper::IssetTake($userORM->first_name, $user, 'first_name');
            $userORM->last_name = Helper::IssetTake($userORM->last_name, $user, 'last_name');
            $userORM->email = Helper::IssetTake($userORM->email, $user, 'email');
            $userORM->address = Helper::IssetTake($userORM->address, $user, 'address');
            $userORM->grade_id = Helper::IssetTake($userORM->grade_id, $user, 'grade_id');
            $userORM->birthdate = Helper::IssetTake($userORM->birthdate, $user, 'birthdate');
            $userORM->telephone = Helper::IssetTake($userORM->telephone, $user, 'telephone');
            $userORM->mobile_phone = Helper::IssetTake($userORM->mobile_phone, $user, 'mobile_phone');
            $userORM->roles()->sync($user['roles']);
            $result = $userORM->save();

            $ret->fill('0', 'Success.');
            $ret->affectedRows = $result;
        } catch (\Exception $e) {
            Log::error($e->__toString());
        }
        return $ret;
    }

    public function destroy($id)
    {
        $ret = new ApiResult();
        try {
            $user = User::find($id);
            if ($user->isEmpty()) {
                $ret->fill('1', 'Uninitialized user ID.');
                return $ret;
            }
            $user->deleted_by = Auth::id();
            $user->deleted_at = $user->freshTimestamp();
            $result = $user->save();
            if ($result) {
                $ret->fill('0', 'Success');
            } else {
                $ret->fill('1', 'Something went wrong when delete user, try again');
            }
            $ret->affectedRows = $result;
        } catch (\Exception $e) {
            Log::error($e->__toString());
        }
        return $ret;
    }

    public function restore($id)
    {
        $ret = new ApiResult();
        try {
            $user = User::onlyTrashed()->find($id);
            if ($user->isEmpty()) {
                $ret->fill('1', 'Uninitialized user ID.');
                return $ret;
            }
            $user->deleted_by = null;
            $user->deleted_at = null;
            $result = $user->save();

            if ($result) {
                $ret->fill('0', 'Success.');
            } else {
                $ret->fill('1', 'Cannot restore the user, try again');
            }
            $ret->affectedRows = $result;
        } catch (\Exception $e) {
            Log::error($e->__toString());
        }
        return $ret;
    }
}
