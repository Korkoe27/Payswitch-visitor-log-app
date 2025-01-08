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

    // return view('/',[
    //     'dept'  => Visitor::simplePaginate(10)
    // ]);

    return view('index',[
        'visitor'  => Visitor::simplePaginate(10)
    ]);


       
});

Route::post('/visit',function(){

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
    return view('visitor.entry');
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
















Route::get('records', function () {
    return view('records');
});

Route::get('settings', function () {
    return view('settings');
});
