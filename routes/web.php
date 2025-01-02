<?php

use App\Models\Visitor;
use App\Models\Employee;
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
        'visitor'  => Visitor::all()
    ]);


       
});

Route::get('records', function () {
    return view('records');
});

Route::get('settings', function () {
    return view('settings');
});

Route::get('staff', function () {
    return view('staff', [
        'employees' => Employee::all()
    ]);
});

// Route::get('visitors', function () {
//     return view('visitors',    [

//     ]);
// });
