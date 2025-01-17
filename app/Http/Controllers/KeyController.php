<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Key;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KeyController extends Controller
{
    public function pickKey(){
        
    $employees = Employee::get();
    return view('keys.create', compact('employees'));
    }

    public function logKey(){
        request()->validate([
            'picked_by' => 'required|exists:employees,id',
        ]);
    
        $employee = Employee::findOrFail(request('picked_by'));
        $department = $employee->department;
    
    
        $activeKeyEvent = Key::where('status', 'picked')
        ->where('status', 'picked')
        ->whereNull('returned_at')
        ->first();
    
    
        if ($activeKeyEvent) {
            $pickedByEmployee = Employee::find($activeKeyEvent->picked_by);
            return redirect()->back()->with('error', 
                "Key has already been picked."
            );
        }
    
    
        Key::create([
            'department_id' => $department->id,
            'picked_by' => $employee->id,
            'picked_at' => Carbon::now(),
            'status' => 'picked'
        ]);
    
        
        return redirect('/');
    }
    




}
