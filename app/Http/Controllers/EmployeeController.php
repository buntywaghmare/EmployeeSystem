<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function employee(){
        $department = Department::all();
        $employee =Employee::all();
        return view('employee.index',['department'=>$department,'employee'=>$employee]);
    }

    public function insertEmployee(Request $request){
       $employee = new Employee();
       $employee->name = $request->input('name');
       $employee->salary = $request->input('salary');
       $employee->dept_id = $request->input('department');
       $employee->hobbies = implode(",",$request->input('hobbies'));
       $employee->gender = $request->input('gender');
       $employee->save();
       return response()->json(1);
    }

    public function deleteEmployee(Request $request){
       $employee = Employee::find($request->input('id'));
       $employee->delete();
       return response()->json(1);
    }

    public function getEmployeeDetail(Request $request){
       $employee = Employee::find($request->input('id'));
        return $employee;
    }

    public function editEmployee(Request $request){
       $employee = Employee::find($request->input('id'));
       $employee->name = $request->input('name');
       $employee->salary = $request->input('salary');
       $employee->dept_id = $request->input('department');
       $employee->hobbies = implode(",",$request->input('hobbies'));
       $employee->gender = $request->input('gender');
       $employee->update();
       return response()->json(1);
    }
}
