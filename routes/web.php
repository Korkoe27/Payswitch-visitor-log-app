<?php

use App\Http\Controllers\ActivitiesController;
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




//auth

Route::middleware('guest')->group(function(){
        Route::view('login', 'auth.login')->name(name: 'login');
        Route::post('login', [UserAuthController::class, 'login']);

});

Route::middleware('auth')->group(function(){



        
Route::get('/', function () {


        $devices = Device::where('status', 'picked')
        ->orWhere('status', 'device_logged_in')
        ->orWhere('created_at', Carbon::today())
        ->with('employee')
        ->simplePaginate(10);

        $keys = KeyEvent::where('status', 'picked')
        ->with(['key', 'employee'])
        ->simplePaginate(10);
        
        return view('index',[
        'visitor' => Visitor::where('status', 'ongoing')->simplePaginate(5),

        'keys' => KeyEvent::with('employee')->where('status', 'picked')->simplePaginate(10),
        'all_keys' => Visitor::where('created_at', Carbon::today())->get(),
        
        ],compact('devices','keys'));


})->name('/');

        

                Route::post('logout', [UserAuthController::class, 'logout']);


                //staff

                Route::controller(EmployeeController::class)->group(function(){

                        Route::get('staff',  'index')->middleware('module.permission:staff,view');

                        Route::get('staff/{staff}',  'show')->middleware('module.permission:staff,view');

                        Route::post('store-staff',  'store')->middleware('module.permission:staff,create,modify,delete');

                        Route::get('create-staff',  'create')->middleware('module.permission:staff,create,modify,delete');
                });



                //visitor


                Route::controller(VisitorController::class)->group(function(){

                        Route::get('visits', 'index');
                        
                        Route::post('visit', 'store');

                        Route::get('create-visit',  'create');

                        // Route::get('old-visitor',  'oldVisitorSignIn')->name('old-visitor');

                        Route::get('check-visitor',  'checkVisitor');

                        Route::post('find-visitor','oldVisitor');

                        Route::get('visit/{visitor}',  'show');

                        Route::get('departure',  'departure');


                        Route::patch('exit', 'exit');
                })->middleware('module.permission:visits,view,create,modify,delete');




                //keys


                Route::controller(KeyEventController::class)->group(function(){

                        Route::get('keys', 'pickedKeys');
                        Route::get('pick-key', 'pickKey');

                        Route::post('log-key',  'logKey');

                        Route::get('submit-key/{keyEvent}', 'submitKey');

                        Route::patch('return-key/{keyEvent}',  'returnKey');


                })->middleware('module.permission:keys,view');

                Route::controller(KeyController::class)->group(function(){
                
                        Route::get('all_keys', [KeyController::class, 'keys']);


                        Route::get('create-key', [KeyController::class, 'create']);

                        Route::post('store-key', [KeyController::class, 'store']);

                })->middleware('module.permission:keys,view,create,modify,delete');




                //device

                Route::controller(DeviceController::class)->group(function(){

                        Route::get('device-logs', 'index');

                        Route::get('log',  'create');

                        Route::patch('sign-out-device/{device}',  'signOutDevice');

                        Route::post('log-device',  'store');


                })->middleware('module.permission:settings,view,create,modify,delete');


                //departments


                Route::controller(DepartmentController::class)->group(function(){
                        Route::get('departments',  'index');

                        Route::get('create-department',  'create');

                        Route::post('store-department',  'store');

                })->middleware('module.permission:departments,view,create,modify,delete');




                //Activity Logs
                Route::controller(ActivitiesController::class)->group(function(){
                        Route::get('logs','index')->middleware('module.permission:logs,view');
                });


                //access card

                Route::controller(VisitorAccessCardController::class)->group(function(){
                Route::get('create-access-card', 'create')->middleware('module.permission:settings,view,create,modify,delete');

                Route::post('store-access-card',  'store')->middleware('module.permission:settings,view,create,modify,delete');

                Route::get('access-cards','index')->middleware('module.permission:reports,view');
                });

                



                Route::get('records', function () {
                return view('records');
                })->middleware('module.permission:reports,view,create,modify,delete');


                Route::view('settings', 'settings.index')
                ->middleware('module.permission:settings,view,create,modify,delete');

        });
