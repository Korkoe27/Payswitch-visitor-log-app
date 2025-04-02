<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{


        public function index(){
            return view('staff.index', [
                'employees' => Employee::with('department')->get()
            ]);
        }
        public function create(){
            $departments = Department::get();
            return view('staff.create', compact('departments'));
        }


        public function store(){

            // dd(request());

            request()->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'other_name' => '',
                'employee_number' => 'required',
                'email' => 'email',
                'phone_number' => 'required',
                'department_id' => 'required|exists:departments,id',
                'vehicle_number' => '',
                'job_title' => 'required',
                'access_card_number' => '',
                'gender'=> 'required',
        
            ]);
        
        
            Employee::create([
                'first_name' => request('first_name'),
                'last_name' => request('last_name'),
                'other_name' => request('other_name'),
                'employee_number' => request('employee_number'),
                'email' => request('email'),
                'phone_number' => request('phone_number'),
                'department_id' => request('department_id'),
                'vehicle_number' => request('vehicle_number'),
                'job_title' => request('job_title'),
                'access_card_number' => request('access_card_number'),
                'gender' => request('gender')
            ]);

            Activities::log(
                action: 'Created New Staff'
            );
        
        
            
            return redirect('staff');

        }


        public function show(Employee $staff){
            
        return view('staff.show', ['employees' => $staff]);
        }





















}
