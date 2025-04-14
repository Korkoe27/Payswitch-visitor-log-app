<?php

namespace App\Http\Controllers;

use App\Models\{Activities,Department, Employee};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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


        public function store(Request $request){

            // dd(request());

            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'other_name' => '',
                // 'employee_number' => 'required',
                'email' => 'email|unique:employees,email|nullable',
                'phone_number' => 'required',
                'department_id' => 'required|exists:departments,id',
                'vehicle_number' => '',
                'job_title' => 'required',
                'access_card_number' => '',
                'gender'=> 'required',
        
            ]);

            Log::info('Request data:', $request->all());

            $phone = request()->phone_number;
            
            $formattedPhone = preg_replace('/^0/','233',$phone);
            
        
        
            Employee::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'other_name' => request('other_name'),
                'employee_number' => request('employee_number'),
                'email' => request('email'),
                'phone_number' => $formattedPhone,
                'department_id' => request('department_id'),
                // 'vehicle_number' => request('vehicle_number'),
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
