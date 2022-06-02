<?php

namespace App\Http\Controllers;

use App\Basic_Info;
use App\Department;
use App\Employee;
use App\Order;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }
    public function dashboard()
    {
        return view('tables.index');
    }

    public function basic_info(){
$infos= Basic_Info::all();
        return view('tables.basic_info', compact('infos'));
    }
    public function edit_basic_info($id){
        $info= Basic_Info::all()->find($id);
        return view('tables.editBasicInfo', compact('info'));
    }
    public function update_basic_info(Request $request, $id){
        $info= Basic_Info::all()->find($id);
        $info->restaurant_name=Request('restaurant_name');
        $info->telephone=Request('telephone');
        $info->address=Request('address');
        $info->save();
        return redirect('/dashboard/tables/basic-info');
    }
    //
    public function orders(){
        $orders= Order::all();
        return view('tables.order', compact('orders'));
    }
    public function deleteOrder($id){
        $order=Order::all()->find($id);
        $order->delete();
        return redirect('/dashboard/tables/order');

    }

    public function dishes(){
        $orders= Basic_Info::all();
        return view('tables.dishes', compact('orders'));
    }



    //employees table function
    public function index() {
        $employees=Employee::all();
        return view('tables.employees',compact('employees'));
    }

    public function employee(){

        return view('tables.addemployee');

    }
    public function department(){
        $departments=Department::all();
        return view('tables.addemployee',compact('departments'));
    }
//====================================================================
//   (function) to upload the employee data  to database
    public function NewEmployee(Request $request){
        $employee=new Employee();
        $employee->employee_name=Request('employee_name');
        $employee->salary=Request('salary');
        $employee->city=Request('city');
        $employee->street=Request('street');
        $employee->position=Request('position');
        $employee->department_id=Request('department_id');

        $employee->save();

        $employee->save();
        return redirect('/employees');
    }

    public function edit($id) {
        $employee=Employee::all()->find($id);
        return view('tables.editemployee',compact('employee'));
    }

    public function update(Request $request,$id){
        $employee=Employee::all()->find($id);
        $employee->employee_name=Request('employee_name');
        $employee->salary=Request('salary');
        $employee->city=Request('city');
        $employee->street=Request('street');
        $employee->position=Request('position');
        $employee->department_id=Request('department_id');

        $employee->save();
        return redirect('/employees');

    }

    public function delete($id){
        $employee=Employee::all()->find($id);
        $employee->delete();
        return redirect('/employees');

    }

//    public function employees(){
//        $orders= Basic_Info::all();
//        return view('tables.employees', compact('orders'));
//    }
}
