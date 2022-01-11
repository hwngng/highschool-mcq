<?php

namespace App\Business;

use App\Common\ApiResult;
use App\DAL\TestDAL;

class TestBus extends BaseBus
{
    private $testDAL;

    private function getTestDAL()
    {
        if (!$this->testDAL) {
            $this->testDAL = new TestDAL();
        }
        return $this->testDAL;
    }

    public function insert($testForm)
    {
        $apiResult = new ApiResult();
        if ((int) $testForm['no_of_questions'] == count($testForm['question_ids'])) {
            $apiResult = $this->getTestDAL()->insert($testForm);
            $testContentBus = new TestContentBus();
            $apiResult->insertTestContent = $testContentBus->insertMany($apiResult->testId, 0, $testForm['question_ids']);
        } else {
            $apiResult->fill(1, 'Not enough question');
        }
        return $apiResult;
    }

    public function getAll()
    {
        return $this->getTestDAL()->getAll();
    }
    public function getAllExcept($exceptTests)
    {
        return $this->getTestDAL()->getAllExcept($exceptTests);
    }

    public function getById($testId)
    {
        return $this->getTestDAL()->getById($testId);
    }

    public function getInfoOnly($testId)
    {
        return $this->getTestDAL()->getInfoOnly($testId);
    }

    public function getAllInfo()
    {
        return $this->getTestDAL()->getAllInfo();
    }

    public function getTestForStudent($testId)
    {
        $apiResult = $this->getById($testId);

        foreach ($apiResult->test->questions as $question) {
            foreach ($question->choices as $choice) {
                $choice->is_solution = null;
            }
        }
        return $apiResult;
    }

    public function update($test)
    {


        $test['name'] = htmlspecialchars($test['name']);
        $test['description'] = htmlspecialchars($test['description']);
        $test['grade_id'] = htmlspecialchars($test['grade_id']);
        $test['duration'] = htmlspecialchars($test['duration']);
        $test['no_of_questions'] = htmlspecialchars($test['no_of_questions']);
        $test['subject_id'] = htmlspecialchars($test['subject_id']);
        $apiResult = $this->getTestDAL()->update($test);
        $testContentBus = new TestContentBus();
        $apiResult->updateQuestion = $testContentBus->updateForTest($test['id'], $test['question_ids']);

        return $apiResult;
    }

    public function destroy($testId)
    {
        return $this->getTestDAL()->destroy($testId);
    }
}
