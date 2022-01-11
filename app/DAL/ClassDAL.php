<?php

namespace App\DAL;

use ReturnMsg;
use App\DAL\BaseDAL;
use App\Common\Helper;
use App\Models\Grade;
use App\Common\ApiResult;
use App\Models\Lop;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Exceptions\NotInClass;

class ClassDAL extends BaseDAL
{
    public function getAll()
    {
        $ret = new ApiResult();
        try {
            $ret->classes = Lop::all();
        } catch (\Exception $e) {
            Log::error($e->__toString());
        }
        return $ret;
    }

    public function getById($id)
    {
        $ret = new ApiResult();
        try {
            $ret->question = Lop::select(
                'id',
                'content',
                'subject_id',
                'grade_id',
                'solution'
            )
                ->where('id', $id)
                ->with('choices:id,question_id,content,is_solution')
                ->first();
        } catch (\Exception $e) {
            Log::error($e->__toString());
        }
        return $ret;
    }

    public function getUsersByClassId($id)
    {
        $apiResult = new ApiResult();
        $apiResult->class  = Lop::find($id);
        $veried = $apiResult->class->members()->where('id', Auth::id())->exists();
        if (!$veried) {
            throw new NotInClass();
        }
        $apiResult->members  = $apiResult->class->members;

        foreach ($apiResult->members as $member) {
            $member->join_at = Carbon::parse($member->pivot->created_at)->diffForHumans();
        }

        return $apiResult;
    }
    public function getByAuthorId($id){
        $ret = new ApiResult();
        try {
            $ret->classes = Lop::where('created_by',$id)->get();
        } catch (\Exception $e) {
            Log::error($e->__toString());
        }
        return $ret;
    }
    public function getTestsByClassId($id)
    {
        $apiResult = new ApiResult();
        try {
            $apiResult->class  = Lop::find($id);
            $apiResult->tests  = $apiResult->class->tests;
            foreach ($apiResult->tests as $test) {
                $test->p_created_at = $test->pivot->created_at->diffForHumans();
                $test->p_start_at = Carbon::parse($test->pivot->start_at)->diffForHumans();
                $test->p_created_by = $test->pivot->created_by;
            }
        } catch (\Exception $e) {
            Log::error($e->__toString());
        }
        return $apiResult;
    }

    public function insertMember($id, $memberId)
    {
        $ret = new ApiResult();
        try {
            $result = Lop::find($id);
            $result->members()->detach($memberId);

            $ret->fill('0', 'Success.');
        } catch (\Exception $e) {
            $ret->fill('1', 'Failure.');
            Log::error($e->__toString());
        }
        return $ret;
    }
    public function insert ($class)
	{
		app('debugbar')->info($class);
		$ret = new ApiResult();
		try {
			$classORM = new Lop();
			$classORM['name'] = Helper::IssetTake($classORM->name, $class, 'name');
			$classORM['description'] = Helper::IssetTake($classORM->description, $class, 'description');
			$classORM['grade_id'] = $class['grade_id'];
			$classORM['code'] = Helper::IssetTake($classORM->code, $class, 'code');

			$classORM['school_id'] = 8;
			$classORM->created_by = Auth::id();

			$result = $classORM->save();


			if ($result)
			{
                $classORM->members()->attach(Auth::id());
				$ret->fill('0', 'Success');
			}
			else
				$ret->fill('1', 'Cannot insert, database error');
		} catch (\Exception $e) {
			Log::error($e->__toString());
		}
		return $ret;
	}
    public function removeMember($id, $memberId)
    {
        $ret = new ApiResult();
        try {
            $result = Lop::find($id);
            $result->members()->detach($memberId);

            $ret->fill('0', 'Success.');
        } catch (\Exception $e) {
            $ret->fill('1', 'Failure.');
            Log::error($e->__toString());
        }
        return $ret;
    }
}
