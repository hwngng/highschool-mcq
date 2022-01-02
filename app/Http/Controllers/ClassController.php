<?php

namespace App\Http\Controllers;

use App\Business\ClassBus;
use App\Business\UserBus;
use App\Business\WorkHistoryBus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    private $userBus;
    private $classBus;
    private $workHistoryBus;


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
        return view('class.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('teacher.class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
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
    public function edit()
    {
        return view('teacher.class.edit');
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
    /**
     * class detail
     *
     * @param  int  $id
     * @return Response
     */
    public function detail($id)
    {
        $apiResult = $this->getClassBus()->getUserById($id);

        $apiResult->tests = $this->getClassBus()->getTestsById($id);
        foreach ($apiResult->tests as $test) {
            $workHistory = $this->getWorkHistoryBus()->getWorkHistoryByTestIdAndUserId(Auth::id(), $test->id)->workHistory;
            $test->score = $workHistory->no_of_correct ? ($workHistory->no_of_correct *10 / $test->no_of_questions) : 0;
        }

        return view('class.detail', compact('apiResult'));
    }
}
