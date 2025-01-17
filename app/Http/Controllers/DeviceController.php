<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    //
    public function create(){
        $employees = Employee::get();
        return view('devices.create', compact('employees'));

    }

    public function store(){
        
        // dd(request()->all());

    request()->validate([
        'staff' => 'required|exists:employees,id',
        'device_brand' => 'required',
        'serial_number' => 'required',
        'action' => 'required',
        // 'logged_at' => Carbon::now()
    ]);
    

    Device::create([
        'employee_id' => request('staff'),
        'device_brand' => request('device_brand'),
        'serial_number' => request('serial_number'),
        'action' => request('action'),
        'logged_at' => Carbon::now()
    ]);

    
    }

}
