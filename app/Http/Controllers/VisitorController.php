<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
   

    public function create(){
        $employees = Employee::get();
        return view('visitor.entry', compact('employees'));

    }


    public function store(){
        
// dd(request());

    $validatedData = request()->validate([
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
        'devices' => 'nullable|array',
        'devices.*.name'=>'required_with:devices|string',
        'devices.*.serial'=>'required_with:devices|string',
        'dependents' => 'nullable|array',
        'dependents.*.name'=>'required_with:dependents|string',
        'dependents.*.phone_number'=>'required_with:dependents|string'
    ]);

    $devicesJson = request()->has('devices') ? json_encode($validatedData['devices']) : null;

    $dependedntsJson = request()->has('dependents') ? json_encode($validatedData['dependents']):null;

    // Visitor::create([
    //     'first_name' => request('first_name'),
    //     'last_name' => request('last_name'),
    //     'email' => request('email'),
    //     'phone_number' => request('phone_number'),
    //     'employee' => request('employee'),
    //     'company_name' => request('company_name'),
    //     'access_card_number' => request('access_card_number'),
    //     'vehicle_number' => request('vehicle_number'),
    //     'purpose' => request('purpose'),
    //     'comment' => request('comment'),
    //     'devices' => request('devices'),
    //     'dependents' => request('dependents')
    // ]);


    Visitor::create([
        'first_name' => $validatedData['first_name'],
        'last_name' => $validatedData['last_name'],
        'email' => $validatedData['email'],
        'phone_number' => $validatedData['phone_number'],
        'employee_Id' => $validatedData['employee'],
        'company_name' => $validatedData['company_name'],
        'access_card_number' => $validatedData['access_card_number'],
        'vehicle_number' => $validatedData['vehicle_number'],
        'purpose' => $validatedData['purpose'],
        'comment' => $validatedData['comment'],
        'devices' => $devicesJson,
        'dependents' => $dependedntsJson,
    ]);

    return redirect('/')->with('success', 'Visitor record created successfully!');

    // return redirect('/');
    }


    public function show(Visitor $visitor){
        
    return view('visitor.show', ['visitor' => $visitor]);
    }



}
