<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
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
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employee =Employee::all();
        $average = Employee::avg('salary');
        $salary = Employee::select('salary')
                            ->orderBy('salary', 'DESC')
                            ->distinct()
                            ->get();
        return view('home',['employee'=>$employee,'average'=>$average,'salary'=>$salary]);
    }

    public function department(){
        $department = Department::all();
        return view('department.index',['department'=>$department]);
    }
}
