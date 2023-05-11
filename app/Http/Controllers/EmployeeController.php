<?php

namespace App\Http\Controllers;


use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function register()
      {
        return view('registerpage');
      }
      //crud operations
    public function index(Request $request)
    {   
        $employee=Employee::get();
        $data['employee']=$employee;
        return view('employee.list',$data);
    }
    public function add()
    {
        return view('employee.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha|min:3',
            'email' => 'required|email|unique:employees',
            'phone' => 'required|digits:10|unique:employees',
            'department' => 'required'
        ]);
        
        $employee = new Employee();
        $employee->id=$request->id; 
        $employee->name=$request->name;
        $employee->email=$request->email;
        $employee->phone=$request->phone; 
        $employee->department=$request->department;
        $employee->remark=$request->remark;
        $employee->save();
      return redirect()->route('employee.list');
    }
    //edit employee
    public function edit(request $request,$id)
      {
        $employee=Employee::where('id',"=",$id)->first();                      
        $data['employee']=$employee;                    
        return view('employee.edit',$data);               
      }

    //update form
    public function update(Request $request,$id)
    {

          $employee=Employee::where('id',"=",$id)->first();
          $employee->id=$request->id; 
          $employee->name=$request->name;
          $employee->email=$request->email;
          $employee->phone=$request->phone; 
          $employee->department=$request->department;
          $employee->remark=$request->remark;
          $employee->save();
        return redirect()->route('employee.list');
    }
    //delete
    public function delete(Request $request,$id)
    {
        $employee=Employee::where('id',"=",$id)->first();
        $employee->delete();
        return back();
    }
    public function checkEmail(Request $request)
    {
        $emailExists = Employee::where('email', $request->email)->exists();

        return response()->json(['exists' => $emailExists]);
    }
    public function checkPhone(Request $request)
    {
        $phoneExists = Employee::where('phone', $request->phone)->exists();

        return response()->json(['exists' => $phoneExists]);
    }

    
}
