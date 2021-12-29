<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassMemberController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    return view('teacher.class.detail');

  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function waitingList()
  {
    return view('teacher.class.waiting-list');

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
