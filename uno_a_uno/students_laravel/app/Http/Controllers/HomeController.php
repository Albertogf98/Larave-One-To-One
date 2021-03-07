<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
  /*  public function index()
    {
        $usersWithGrades = User::with('grades')->simplePaginate(4);
       return auth()->check() && auth()->user()->user_type === 'teacher' ? view('teacher.home') : view('student.home');
    }*/
}
