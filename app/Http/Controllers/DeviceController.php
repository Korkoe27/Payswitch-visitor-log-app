<?php

    namespace App\Http\Controllers;

    use App\Models\Activities;
    use App\Models\Device;
    use App\Models\Employee;
    use Carbon\Carbon;
    use Illuminate\Support\Facades\Log;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    class DeviceController extends Controller
    {
        //


        public function index(){
            return view('devices.index',[
                'devices' => Device::simplePaginate(15)
            ]);
        }

        public function create(){
            $employees = Employee::get();
            return view('devices.create', compact('employees'));

        }

        public function store(Request $request) {
            try {
                $request->validate([
                    'serial_number' => 'required',
                    'device_brand' => 'required',
                    'employee_id' => 'required|exists:employees,id',
                    'action' => 'required',
                ]);
                // dd($request->action);

                if($request->action ==='bringDevice'){
                    $status = 'deviceLoggedIn';
                }else{
                    $status = 'takeHome';
                }
        
                // dd($status);
                $staff = Employee::findOrFail(request('employee_id'));
                $employeeName = $staff->first_name . ' ' . $staff->last_name;
                try{
                Device::create([
                    'device_brand' => $request->device_brand,
                    'serial_number' => $request->serial_number,
                    'employee_id' => $staff->id,
                    'action' => $request->action,
                    'status' => $status,
                    'logged_at' => Carbon::now(),
                ]);

                } catch(\Exception $e){
                    Log::debug("Did not log device because: ". $e);
                }
                // Log::debug('Hello: ' );
                Activities::log(
                    action: 'Logged Device',
                    description: $employeeName . ' logged their device!'
                );

                return redirect('/')->with('success', 'Device logged successfully.');
                // return redirect()->back()->with('success', 'Device logged successfully.');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => 'An error occurred while logging the device.']);
            }
        }


        public function signOutDevice(Device $device){
            // dd($device->status);
            if($device->status == 'takeHome'){
                $status = 'returned';
                $device->update([
                    'status' => $status,
                    'returned_at' => Carbon::now(),
                ]);
            }else{
                $status = (string) 'signed_out';

                $device->update([
                    'status' => $status,
                    'signed_out_at' => Carbon::now(),
                ]);
            }
            Activities::log(
                action: 'Updated Device Log'
            );
            return redirect()->back()->with('success', 'Device signed out successfully.');
        }

    }
