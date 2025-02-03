<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\KeyController;
use App\Http\Controllers\KeyEventController;
use App\Http\Controllers\VisitorController;
use App\Models\Device;
use App\Models\Visitor;
use App\Models\KeyEvent;
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


    $devices = Device::with('employee')->get();
    return view('index',[
        'visitor' => Visitor::where('status', 'ongoing')->simplePaginate(5),

        'departed' => Visitor::where('status', 'departed')->simplePaginate(5),

        'keys' => KeyEvent::with('pickedByEmployee')->simplePaginate(10),
        
    ],compact('devices'));


       
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

// Route::get('departure/{visitor}', [VisitorController::class, 'departure'])->name('departure');
Route::get('departure', [VisitorController::class, 'departure']);


Route::put('exit',[VisitorController::class, 'exit']);



//keys

Route::get('pick-key',[KeyEventController::class, 'pickKey']);

Route::post('log-key', [KeyEventController::class, 'logKey']);


//device

Route::get('device-logs/create', [DeviceController::class, 'create']);


Route::post('log-device', [DeviceController::class, 'store']);





Route::get('records', function () {
    return view('records');
});

Route::get('settings', function () {
    return view('settings');
});
