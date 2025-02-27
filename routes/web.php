<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\KeyController;
use App\Http\Controllers\KeyEventController;
use App\Http\Controllers\UserAuthController;
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


       
})->middleware('auth')->name('/');



//auth

Route::middleware('guest')->group(function(){
        Route::view('login', 'auth.login')->name(name: 'login');
        Route::post('login', [UserAuthController::class, 'login']);

});

Route::middleware('auth')->group(function(){



        

Route::post('logout', [UserAuthController::class, 'logout']);


//staff

Route::controller(EmployeeController::class)->group(function(){

        Route::get('staff',  'index');

        Route::get('staff/{staff}',  'show');

        Route::post('store-staff',  'store');

        Route::get('create-staff',  'create');
});



//visitor


Route::controller(VisitorController::class)->group(function(){
        
        Route::post('visit', 'store');

        Route::get('create-visit',  'create');

        // Route::get('old-visitor',  'oldVisitorSignIn')->name('old-visitor');

        Route::get('check-visitor',  'checkVisitor');

        Route::post('find-visitor','oldVisitor');

        Route::get('visit/{visitor}',  'show');



        Route::get('departure',  'departure');


        Route::patch('exit', 'exit');
});




//keys


Route::controller(KeyEventController::class)->group(function(){
        Route::get('pick-key', 'pickKey');

        Route::post('log-key',  'logKey');

        Route::get('submit-key/{keyEvent}', 'submitKey');

        Route::patch('return-key/{keyEvent}',  'returnKey');


});

Route::controller(KeyController::class)->group(function(){
    
        Route::get('keys', [KeyController::class, 'keys']);


        Route::get('create-key', [KeyController::class, 'create']);

        Route::post('store-key', [KeyController::class, 'store']);

});




//device

Route::controller(DeviceController::class)->group(function(){

        Route::get('device-logs/create',  'create');

        Route::patch('sign-out-device/{device}',  'signOutDevice');

        Route::post('log-device',  'store');


});


//departments


Route::controller(DepartmentController::class)->group(function(){
        Route::get('departments',  'index');

        Route::get('create-department',  'create');

        Route::post('store-department',  'store');

    });





//access card

Route::controller(VisitorAccessCardController::class)->group(function(){
Route::get('create-access-card',     'create');

Route::post('store-access-card',  'store');

});



Route::get('records', function () {
    return view('records');
});

// Route::get('settings', function () {
//     return view('settings.settings');
// });


Route::view('settings', 'settings.index');
});
