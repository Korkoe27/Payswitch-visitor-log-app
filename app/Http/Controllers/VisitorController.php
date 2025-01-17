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
    }


    public function show(Visitor $visitor){
        
    return view('visitor.show', ['visitor' => $visitor]);
    }



}
