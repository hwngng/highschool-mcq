<?php

namespace App\Http\Controllers;

use App\Business\UserBus;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    private $userBus;

    private function getUserBus()
    {
        if ($this->userBus == null) {
            $this->userBus = new UserBus();
        }
        return $this->userBus;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $apiResult = $this->getUserBus()->getAllForAdmin();
        $viewData = [
            'users' => $apiResult->users,
            'schools' => $apiResult->schools,
            'grades' => $apiResult->grades,
            'roles' => $apiResult->roles,
        ];

        return view('admin.user.index', $viewData);
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
    public function store(UserRequest $userForm)
    {
        $user = $userForm->all();
        $user['roles'] = [$user['roles']];
        $apiResult = $this->getUserBus()->insert($userForm);

        return response()->json($apiResult->report());
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
    public function destroy($userId)
    {
        $apiResult = $this->getUserBus()->destroy($userId);

        return response()->json($apiResult->report());
    }

}
