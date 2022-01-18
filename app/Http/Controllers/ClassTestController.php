<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Business\ClassBus;
use App\Business\TestBus;
use App\Business\UserBus;
use App\Business\WorkHistoryBus;
use App\Common\ApiResult;

class ClassTestController extends Controller
{

    private $userBus;
    private $classBus;
    private $workHistoryBus;
    private $testBus;

    private function getUserBus()
    {
        if ($this->userBus == null) {
            $this->userBus = new UserBus();
        }
        return $this->userBus;
    }
    private function getClassBus()
    {
        if ($this->classBus == null) {
            $this->classBus = new ClassBus();
        }
        return $this->classBus;
    }
    private function getTestBus()
    {
        if ($this->testBus == null) {
            $this->testBus = new TestBus();
        }
        return $this->testBus;
    }
    private function getWorkHistoryBus()
    {
        if ($this->workHistoryBus == null) {
            $this->workHistoryBus = new WorkHistoryBus();
        }
        return $this->workHistoryBus;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($classId,Request $request)
    {
        $testids = [];

        if (!empty($request->except('_token'))) {
            $tests = $request->except('_token');
            foreach ($tests as $t => $value) {
                if (strpos($t, '_insert') !== false) {
                    $testids[$value] = true;
                } else if (strpos($t, '_started_at') !== false) {
                    $test = (object)null;
                    $test->started_at = $value;
                    if (array_key_exists(str_replace("_started_at", "", $t), $testids)) {
                        $testids[str_replace("_started_at", "", $t)] = $test;
                    }
                }
            }
        }
        foreach ($testids as $value) {
            if (!$value->started_at) {
                $ret = (object)null;
                $ret->return_code = '1';
                $ret->return_msg  = 'Please insert start time to the test you chosen';
                return response()->json($ret);
            }
        }
        $ret = $this->getClassBus()->insertTests($classId, $testids);
        return $tests;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
    }
}
