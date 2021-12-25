<?php

namespace App\Business;

use App\Business\BaseBus;
use App\DAL\QuestionDAL;
use App\Common\Constant;
use App\Models\Question;

class QuestionBus extends BaseBus
{
	private $questionDAL;
	private $choiceBus;

	private function getQuestionDAL ()
	{
		if (!$this->questionDAL) {
			$this->questionDAL = new QuestionDAL();
		}
		return $this->questionDAL;
	}

	private function getChoiceBus ()
	{
		if (!$this->choiceBus) {
			$this->choiceBus = new ChoiceBus();
		}
		return $this->choiceBus;
	}

	public function getAll ()
	{
		return $this->getQuestionDAL()->getAll();
	}

	public function getById ($id)
	{
		$apiResult = $this->getQuestionDAL()->getById($id);

		return $apiResult;
	}

	public function insert($question)
	{
		$question['content'] = htmlspecialchars($question['content']);
		$question['solution'] = htmlspecialchars($question['solution']);
		$apiResult = $this->getQuestionDAL()->insert($question);
		$apiResult->insertChoice = $this->getChoiceBus()->insertForQuestion($apiResult->questionId, $question['choices']);

		return $apiResult;
	}

	public function update ($question)
	{
		$question['content'] = htmlspecialchars($question['content']);
		$question['solution'] = htmlspecialchars($question['solution']);
		$apiResult = $this->getQuestionDAL()->update($question);
		$choiceBus = new ChoiceBus();
		$apiResult->updateChoice = $choiceBus->updateForQuestion($question['id'], $question['choices']);

		return $apiResult;
	}

	public function destroy ($questionId)
	{
		return $this->getQuestionDAL()->destroy($questionId);
	}

	public function restore ($questionId)
	{
		return $this->getQuestionDAL()->restore($questionId);
	}
}
