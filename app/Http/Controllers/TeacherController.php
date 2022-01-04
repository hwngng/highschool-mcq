<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business\UserBus;

class TeacherController extends Controller
{
    private $userBus;
    private function getUserBus()
    {
        if ($this->userBus == null) {
            $this->userBus = new UserBus();
        }
        return $this->userBus;
    }
    public function index()
    {
        return view('teacher.index');
    }
    public function list()
    {
        return view('teacher.list');
    }
    public function about($userId)
    {
        $user = $this->getUserBus()->getById($userId)->user;
        $viewData = [
            'user' => $user,
        ];
        return view('teacher.about',$viewData);
    }
}
