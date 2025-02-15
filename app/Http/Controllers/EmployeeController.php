<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function getEmployees() {
        $employees = Employee::all();
        return view("welcome", compact("employees"));
    }

    public function createEmployee(Request $request) {
        $request->validate([
            'name' => 'required|min:5|max:20',
            'age' => 'required|integer|gt:20',
            'address' => 'required|min:10|max:40',
            'phone' => 'required|string|regex:/^08\d{7,10}$/'
        ]);

        Employee::create([
            'name' => $request->name,
            'age' => $request->age,
            'address' => $request->address,
            'phone' => $request->phone
        ]);

        return redirect()->route("employee.view");
    }

    public function updateEmployee(Request $request, $id) {
        $employee = Employee::find($id);

        if(!$employee) {
            return redirect()->route('employee.view')->with('error', 'Employee not found');
        }

        $request->validate([
            'name' => 'required|min:5|max:20',
            'age' => 'required|integer|gt:20',
            'address' => 'required|min:10|max:40',
            'phone' => 'required|string|regex:/^08\d{7,10}$/'
        ]);

        $employee->update([
            'name' => $request->name,
            'age' => $request->age,
            'address' => $request->address,
            'phone' => $request->phone
        ]);
        
        return redirect()->route('employee.view');
    }

    public function deleteEmployee($id) {
        $employee = Employee::find($id);
        if($employee) {
            $employee->delete();
        }
        return redirect()->route('employee.view');
    }

    public function getCreatePage() {
        return view('createEmployee');
    }

    public function getUpdatePage($id) {
        $employee = Employee::find($id);
        if(!$employee) {
            return redirect()->route('employee.view')->with('error', 'Employee not found');
        }
        return view('updateEmployee', compact('employee'));
    }
}