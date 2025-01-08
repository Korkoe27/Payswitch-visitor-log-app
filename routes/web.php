<?php

use App\Http\Controllers\EmployeeController;
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
        'visitor'  => Visitor::simplePaginate(10)
    ]);


       
});

Route::get('records', function () {
    return view('records');
});

Route::get('settings', function () {
    return view('settings');
});

Route::get('staff', function () {
    return view('staff.index', [
        'employees' => Employee::with('department')->simplePaginate(10)
    ]);
});

Route::get('create-visit', function(){
    return view('visitor.entry');
});

Route::post('/visit',function(){
    dd(request()->all());
});


Route::get('staff/{id}', function ($id) {
    $employees = Employee::findOrFail($id); // This will throw a 404 error if the record is not found
    return view('staff.show', compact('employees'));
});

// Route::get('staff/{id}', [EmployeeController::class, 'show']);
