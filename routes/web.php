<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\KeyController;
use App\Http\Controllers\VisitorController;
use App\Models\Department;
use App\Models\Device;
use App\Models\Visitor;
use App\Models\Employee;
use App\Models\Key;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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
        'devices' => Device::with('devices')->get()
    ]);


       
});


//staff

Route::get('staff', [EmployeeController::class, 'index']);

Route::get('staff/{staff}', [EmployeeController::class, 'show']);

Route::post('store-staff', [EmployeeController::class, 'store']);

Route::get('create-staff', [EmployeeController::class, 'create']);


//visitor

Route::post('visit',[VisitorController::class, 'store']);

Route::get('create-visit', [VisitorController::class, 'create']);

Route::get('visit/{visitor}', [VisitorController::class, 'show']);




//keys

Route::get('pick-key',[KeyController::class, 'pickKey']);

Route::post('log-key', [KeyController::class, 'logKey']);


//device

Route::get('create-device-log', [DeviceController::class, 'create']);


Route::post('log-device', [DeviceController::class, 'store']);





Route::get('records', function () {
    return view('records');
});

Route::get('settings', function () {
    return view('settings');
});
