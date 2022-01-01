<?php

namespace App\DAL;

use ReturnMsg;
use App\DAL\BaseDAL;
use App\Models\Test;
use App\Common\Helper;
use App\Models\Question;
use App\Common\ApiResult;
use App\Models\TestContent;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class TestDAL extends BaseDAL
{
    public function getAll()
    {
        $ret = new ApiResult();
        try {
            $ret->tests = Test::select(
                'id',
                'test_code',
                'name',
                'grade_id',
                'subject_id',
                'duration',
                'description',
                'no_of_questions',
                'created_at',
                'created_by'
            )
                ->with('createdBy:id,username,first_name,last_name')
                ->with('subject:id,name')
                ->orderBy('created_at','desc')
                ->get();
        } catch (\Exception $e) {
            Log::error($e->__toString());
        }
        return $ret;
    }

    public function getById($id, $code = 0)
    {
        $ret = new ApiResult();
        try {
            $test = Test::select(
                            'id',
                            'test_code',
                            'name',
                            'grade_id',
                            'subject_id',
                            'duration',
                            'description',
                            'no_of_questions',
                            'created_at',
                            'created_by'
                        )
                        ->where('id', $id)
                        ->with('createdBy:id,username,first_name,last_name')
                        ->with('subject:id,name')
                        ->first();
            $ret->test = $test;

            $testContents = TestContent::select(
                                            'test_id',
                                            'test_code',
                                            'question_id'
                                        )
                                        ->where('test_id', $id)
                                        ->where('test_code', $code)
                                        ->with('question.choices')
                                        ->get();
            $questions = [];
            foreach ($testContents as $testContent) {
                // append to list question
                $questions[] = $testContent->question;
            }
            $ret->test->questions = $questions;
        } catch (\Exception $e) {
            Log::error($e->__toString());
        }

        return $ret;
    }

    public function getAllInfo()
    {
        $ret = new ApiResult();
        $tests = Test::select(
            'id',
            'test_code',
            'name',
            'grade_id',
            'subject_id',
            'duration',
            'description',
            'no_of_questions',
            'created_at',
            'created_by'
        )->get();
        $ret->tests = $tests;
        return $ret;
    }

    public function getInfoOnly($id, $code = 0)
    {
        $ret = new ApiResult();
        $test = Test::select(
            'id',
            'test_code',
            'name',
            'grade_id',
            'duration',
            'description',
            'no_of_questions',
            'created_at',
            'created_by'
        )->where('id', $id)
            ->first();
        $ret->test = $test;
        return $ret;
    }

    public function insert($test)
    {
        $ret = new ApiResult();
        try {
            $testORM = new Test();
            $testORM->test_code = Helper::IssetTake($testORM->test_code, $test, 'test_code');
            $testORM->name = Helper::IssetTake($testORM->name, $test, 'name');
            $testORM->grade_id = Helper::IssetTake($testORM->grade_id, $test, 'grade_id');
            $testORM->subject_id = Helper::IssetTake($testORM->subject_id, $test, 'subject_id');
            $testORM->duration = Helper::IssetTake($testORM->duration, $test, 'duration');
            $testORM->description = Helper::IssetTake($testORM->description, $test, 'description');
            $testORM->no_of_questions = Helper::IssetTake($testORM->no_of_questions, $test, 'no_of_questions');
            $testORM->created_at = $testORM->freshTimestamp();
            $testORM->created_by = Auth::id();
            app('debugbar')->info($testORM);

            $result = $testORM->save();

            if ($result) {
                $ret->fill('0', 'Success');
                $ret->testId = $testORM->id;
            
            } else
                $ret->fill('1', 'Cannot insert, database error.');
        } catch (\Exception $e) {
            Log::error($e->__toString());
        }
        return $ret;
    }

    public function start($test)
    {
    }
}
