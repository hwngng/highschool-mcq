<?php
namespace App\DAL;

use App\DAL\BaseDAL;
use App\Common\Helper;
use App\Models\Question;
use App\Common\ApiResult;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class QuestionDAL extends BaseDAL
{

	public function getAll ()
	{
		$ret = new ApiResult();
		try {
			$ret->questions = Question::select('id',
										'content',
										'grade_id',
										'subject_id')
								->with('subject:id,name')
								->get();
		} catch (\Exception $e) {
			Log::error($e->__toString());
		}

		return $ret;
	}

	public function getById ($id)
	{
		$ret = new ApiResult();
		try {
			$ret->question = Question::select('id',
										'content',
										'subject_id',
										'grade_id',
										'solution')
								->where('id', $id)
								->with('choices:id,question_id,content,is_solution')
								->first();
		} catch (\Exception $e) {
			Log::error($e->__toString());
		}
		return $ret;
	}

	public function insert ($question)
	{
		app('debugbar')->info($question);
		$ret = new ApiResult();
		try {
			$questionORM = new Question();
			$questionORM->content = Helper::IssetTake($questionORM->content, $question, 'content');
			$questionORM->solution = Helper::IssetTake($questionORM->solution, $question, 'solution');
			$questionORM->grade_id = Helper::IssetTake($questionORM->grade_id, $question, 'grade_id');
			// $questionORM->subject_id = Helper::IssetTake($questionORM->subject_id, $question, 'subject_id');
			$questionORM->subject_id = 4;
			$questionORM->created_by = Auth::id();

			$result = $questionORM->save();

			if ($result)
			{
				$ret->fill('0', 'Success');
				$ret->questionId = $questionORM->id;
			}
			else
				$ret->fill('1', 'Cannot insert, database error');
		} catch (\Exception $e) {
			Log::error($e->__toString());
		}
		return $ret;
	}

	public function update ($question)
	{
		$ret = new ApiResult();
		try
		{
			if (!isset($question['id']))
			{
				$ret->fill('1', 'Question not found');
				return $ret;
			}
			$questionORM = Question::find($question['id']);

			$questionORM->content = Helper::IssetTake($questionORM->content, $question, 'content');
			$questionORM->solution = Helper::IssetTake($questionORM->solution, $question, 'solution');
			$questionORM->grade_id = Helper::IssetTake($questionORM->grade_id, $question, 'grade_id');
			$questionORM->subject_id = Helper::IssetTake($questionORM->subject_id, $question, 'subject_id');

			$result = $questionORM->save();

			$ret->fill('0', 'Success');
			$ret->affectedRows = $result;
		}
		catch (\Exception $e)
		{
			Log::error($e->__toString());
		}
		return $ret;
	}

	public function destroy ($id)
	{
		$ret = new ApiResult();
		try
		{
			$question = Question::find($id);
			if (!$question) {
                $ret->fill('1', 'Question not found');
                return $ret;
            }
			$question->deleted_by = Auth::id();
			$question->deleted_at = $question->freshTimestamp();
			$result = $question->save();

			if ($result) {
				$ret->fill('0', 'Success');
			}
			else {
				$ret->fill('1', 'Cannot delete, database error');
			}
		}
		catch (\Exception $e)
		{
			Log::error($e->__toString());
		}
		return $ret;
	}

	public function restore ($id)
	{
		$ret = new ApiResult();
		try
		{
			$question = Question::onlyTrashed()->find($id);
			if ($question->isEmpty()) {
                $ret->fill('1', 'Question not found');
                return $ret;
            }
			$question->deleted_by = null;
			$question->deleted_at = null;
			$result = $question->save();

			$ret->fill('0', 'Success');
			$ret->affectedRows = $result;
		}
		catch (\Exception $e)
		{
			Log::error($e->__toString());
		}
		return $ret;
	}

}
