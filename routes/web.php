<?php

use App\Http\Controllers\EmployeeController;
use App\Models\Department;
use App\Models\Device;
use App\Models\Visitor;
use App\Models\Employee;
use App\Models\Key;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {



    return view('index',[
        'visitor'  => Visitor::simplePaginate(10),
        'keys' => Key::with('department')->simplePaginate(10),
    ]);


       
});

Route::post('visit',function(){

    request()->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => '',
        'phone_number' => 'required',
        'employee' => 'required',
        'company_name' => '',
        'access_card_number' => 'required',
        'vehicle_number' => '',
        'purpose' => 'required',
        'comment' => '',
        'devices' => '',
        'dependents' => ''
    ]);

    Visitor::create([
        'first_name' => request('first_name'),
        'last_name' => request('last_name'),
        'email' => request('email'),
        'phone_number' => request('phone_number'),
        'employee' => request('employee'),
        'company_name' => request('company_name'),
        'access_card_number' => request('access_card_number'),
        'vehicle_number' => request('vehicle_number'),
        'purpose' => request('purpose'),
        'comment' => request('comment'),
        'devices' => request('devices'),
        'dependents' => request('dependents')
    ]);

    return redirect('/');
});


Route::get('create-visit', function(){
    
    $employees = Employee::get();
    return view('visitor.entry', compact('employees'));
});




Route::get('visit/{id}', function ($id) {
    $visitor = Visitor::findOrFail($id);
    return view('visitor.show', compact('visitor'));
});




Route::get('staff', function () {
    return view('staff.index', [
        'employees' => Employee::with('department')->simplePaginate(10)
    ]);
});

Route::get('staff/{id}', function ($id) {
    $employees = Employee::findOrFail($id); // This will throw a 404 error if the record is not found
    return view('staff.show', compact('employees'));
});




Route::get('pick-key',function(){

    $employees = Employee::get();
    return view('keys.create', compact('employees'));
});


Route::get('create-staff', function(){
    $departments = Department::get();
    return view('staff.create', compact('departments'));
});

Route::post('log-key', function(){
    // dd(request()->all());
    request()->validate([
        'picked_by' => 'required|exists:employees,id',
    ]);

    $employee = Employee::findOrFail(request('picked_by'));
    $department = $employee->department;


    $activeKeyEvent = Key::where('status', 'picked')
    ->where('status', 'picked')
    ->whereNull('returned_at')
    ->first();


    if ($activeKeyEvent) {
        $pickedByEmployee = Employee::find($activeKeyEvent->picked_by);
        return redirect()->back()->with('error', 
            "Key has already been picked."
        );
    }


    Key::create([
        'department_id' => $department->id,
        'picked_by' => $employee->id,
        'picked_at' => Carbon::now(),
        'status' => 'picked'
    ]);

    
    return redirect('/');
});



Route::post('store-staff',function(){


    // dd(request()->all());
    request()->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'employee_number' => 'required',
        'email' => 'required|email',
        'phone_number' => 'required',
        'department_id' => 'required|exists:departments,id',
        'vehicle_number' => '',
        'job_title' => 'required',
        'access_card_number' => 'required',
        'gender'=> 'required',

    ]);


    Employee::create([
        'first_name' => request('first_name'),
        'last_name' => request('last_name'),
        'employee_number' => request('employee_number'),
        'email' => request('email'),
        'phone_number' => request('phone_number'),
        'department_id' => request('department_id'),
        'vehicle_number' => request('vehicle_number'),
        'job_title' => request('job_title'),
        'access_card_number' => request('access_card_number'),
        'gender' => request('gender')
    ]);


    
    return redirect('staff');
});



Route::get('create-device-log', function () {
    $employees = Employee::get();
    return view('devices.create', compact('employees'));
});


Route::post('log-device', function () {
    // dd(request()->all());

    $validatedData = request()->validate([
        'device_brand' => 'required|string|max:255',
        'serial_number' => 'required|string|max:255',
        'employee_id' => 'required|exists:employees,id',
        'action' => 'required|string',
        'logged_at' => 'nullable|date', // Optional if provided by user
    ]);

    // Create the device
    $device = Device::create([
        'device_brand' => $validatedData['device_brand'],
        'serial_number' => $validatedData['serial_number'],
        'employee_id' => $validatedData['employee_id'],
        'action' => $validatedData['action'],
        'logged_at' => $validatedData['logged_at'] ?? Carbon::now(),
    ]);

});





Route::get('records', function () {
    return view('records');
});

Route::get('settings', function () {
    return view('settings');
});
