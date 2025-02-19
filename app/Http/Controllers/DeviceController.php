<?php

    namespace App\Http\Controllers;

    use App\Models\Device;
    use App\Models\Employee;
    use Carbon\Carbon;
    use Illuminate\Support\Facades\Log;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    class DeviceController extends Controller
    {
        //
        public function create(){
            $employees = Employee::get();
            return view('devices.create', compact('employees'));

        }

        public function store(Request $request) {
            try {
                request()->validate([
                    'serial_number' => 'required',
                    'device_brand' => 'required',
                    'employee_id' => 'required|exists:employees,id',
                    'action' => 'required',
                ]);
        
                $staff = Employee::findOrFail(request('employee_id'));
        
                Device::create([
                    'serial_number' => request('serial_number'),
                    'device_brand' => request('device_brand'),
                    'employee_id' => $staff->id,
                    'action' => request('action'),
                    'logged_at' => Carbon::now(),
                ]);
        
                return redirect()->back()->with('success', 'Device logged successfully.');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => 'An error occurred while logging the device.']);
            }
        }


        public function updateDeviceLog(){
            
        }
        

    }
