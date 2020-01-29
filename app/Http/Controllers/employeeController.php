<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class employeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('reservations', compact('employees'));
        //
    }
}
