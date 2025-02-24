<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\KeyController;
use App\Http\Controllers\KeyEventController;
use App\Http\Controllers\VisitorAccessCardController;
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


    $devices = Device::where('status', 'picked')
    ->orWhere('status', 'device_logged_in')
    ->with('employee')
    ->simplePaginate(10);

    $keys = KeyEvent::where('status', 'picked')
    ->with(['key', 'employee'])
    ->simplePaginate(10);
    return view('index',[
        'visitor' => Visitor::where('status', 'ongoing')->simplePaginate(5),

        'departed' => Visitor::where('status', 'departed')->simplePaginate(5),

        // 'keys' => KeyEvent::with('pickedByEmployee')->where('status', 'picked')->simplePaginate(10),
        
    ],compact('devices','keys'));


       
});



//auth
Route::get('login', function () {
    return view('auth.login');
});


//staff

Route::get('staff', [EmployeeController::class, 'index']);

Route::get('staff/{staff}', [EmployeeController::class, 'show']);

Route::post('store-staff', [EmployeeController::class, 'store']);

Route::get('create-staff', [EmployeeController::class, 'create']);


//visitor

Route::post('visit',[VisitorController::class, 'store']);

Route::get('create-visit', [VisitorController::class, 'create']);

// Route::get('old-visitor', [VisitorController::class, 'oldVisitorSignIn'])->name('old-visitor');

Route::get('check-visitor', [VisitorController::class, 'checkVisitor']);

Route::post('find-visitor',[VisitorController::class,'oldVisitor']);

Route::get('visit/{visitor}', [VisitorController::class, 'show']);



Route::get('departure', [VisitorController::class, 'departure']);


Route::patch('exit',[VisitorController::class, 'exit']);



//keys





Route::get('keys', [KeyController::class, 'keys']);

Route::get('pick-key',[KeyEventController::class, 'pickKey']);

Route::post('log-key', [KeyEventController::class, 'logKey']);

Route::get('create-key', [KeyController::class, 'create']);

Route::post('store-key', [KeyController::class, 'store']);

Route::get('submit-key/{keyEvent}',[KeyEventController::class, 'submitKey']);

Route::patch('return-key/{keyEvent}', [KeyEventController::class, 'returnKey']);


//device

Route::get('device-logs/create', [DeviceController::class, 'create']);

Route::patch('sign-out-device/{device}', [DeviceController::class, 'signOutDevice']);

Route::post('log-device', [DeviceController::class, 'store']);



//departments


Route::get('departments', [DepartmentController::class, 'index']);

Route::get('create-department', [DepartmentController::class, 'create']);

Route::post('store-department', [DepartmentController::class, 'store']);



//access card
Route::get('create-access-card', [VisitorAccessCardController::class,    'create']);

Route::post('store-access-card', [VisitorAccessCardController::class, 'store']);



Route::get('records', function () {
    return view('records');
});

Route::get('settings', function () {
    return view('settings');
});
