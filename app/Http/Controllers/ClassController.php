<?php

namespace App\Http\Controllers;

use App\Business\SchoolBus;
use App\Business\ClassBus;
use App\Business\TestBus;
use App\Business\UserBus;
use App\Business\WorkHistoryBus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    private $userBus;
    private $classBus;
    private $workHistoryBus;
    private $schoolBus;
    private $testBus;

    private function getSchoolBus()
    {
        if ($this->schoolBus == null) {
            $this->schoolBus = new schoolBus();
        }
        return $this->schoolBus;
    }

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

    public function index()
    {
        $apiResult = $this->getClassBus()->getByAuthorId(Auth::id());
        foreach ($apiResult->classes as $class) {
            // $class->school = $this->getSchoolBus()->getSchoolById($class->school_id)->school;
            $class->members = $this->getClassBus()->getUserById($class->id)->members;
            $class->numOfMembers = $class->members->count() - 1;
            $class->exams = $this->getClassBus()->getTestsById($class->id);
            $class->numOfExams = $class->exams->count();
        }

        $viewData = [
            'classes' => $apiResult->classes

        ];

        return view('class.index', $viewData);
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
        $class = array();
        $class['name'] = $request['class-name'];
        $class['code'] = $request['password'];
        $class['description'] = $request['class-info'];
        $class['grade_id'] = $request['class-grade'];
        $apiResult = $this->getClassBus()->insert($class);
        if ($apiResult->getRetCode() == 0)
            return redirect()->route('teacher.class.list');
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
        $exceptTests =[];
        $apiResult = $this->getClassBus()->getUserById($id);
        $apiResult->tests = $this->getClassBus()->getTestsById($id);

        foreach ($apiResult->tests as $test) {
            $workHistory = $this->getWorkHistoryBus()->getWorkHistoryByTestIdAndUserId(Auth::id(), $test->id)->workHistory;
            $test->score = $workHistory ? ($workHistory->no_of_correct * 10 / $test->no_of_questions) : 0;
            array_push($exceptTests,$test->id);
        }
        $apiResult->testList = $this->getTestBus()->getAllExcept($exceptTests)->tests;
        foreach ($apiResult->testList as $tl) {
            $tl->p_created_by = $this->getUserBus()->getById($tl->created_by)->user;
        }
        return view('class.detail', compact('apiResult'));
    }

    public function removeMember($id, $memberId = null)
    {
        $apiResult = null;
        if ($memberId) {
            $apiResult =  $this->getClassBus()->removeMember($id, $memberId);
        } else {
            $apiResult = $this->getClassBus()->removeMember($id, Auth::id());
        }
        return compact('apiResult');
    }
}
