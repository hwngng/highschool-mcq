<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Common\ApiResult;
use App\Business\ClassBus;
use App\Business\SchoolBus;
use App\Http\Requests\QuestionRequest;

class ClassController extends Controller
{
  private $classBus;
  private $schoolBus;
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */


  private function getClassBus ()
    {
        if ($this->classBus == null)
        {
            $this->classBus = new ClassBus();
        }
        return $this->classBus;
    }

  private function getSchoolBus ()
    {
        if ($this->schoolBus == null)
        {
            $this->schoolBus = new schoolBus();
        }
        return $this->schoolBus;
    }

  public function index()
  {
    $apiResult = $this->getClassBus()->getAll();
    $viewData = [
        'classes' => $apiResult->questions
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

?>
