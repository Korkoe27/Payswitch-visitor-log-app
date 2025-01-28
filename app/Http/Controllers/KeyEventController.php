<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Key;
use App\Models\KeyEvent;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KeyEventController extends Controller
{
    public function pickKey(){
        
        $employees = Employee::get();
        $keys = Key::get();
        return view('keys.create',compact('employees','keys'));
        }
    
        public function logKey(){

            // dd(request()->all());
            request()->validate([
                'picked_by' => 'required|exists:employees,id',
                'key_name' => 'required',
            ]);
        
            $employee = Employee::findOrFail(request('picked_by'));
        
        
            $activeKeyEvent = KeyEvent::where('status', 'picked')
            ->where('status', 'picked')
            ->whereNull('returned_at')
            ->first();
        
        
            if ($activeKeyEvent) {
                $pickedByEmployee = Employee::find($activeKeyEvent->picked_by);
                return redirect()->back()->with('error', 
                    "Key has already been picked."
                );
            }
        
        
            KeyEvent::create([
                'key_name' => request('key_name'),
                'picked_by' => $employee->id,
                'picked_at' => Carbon::now(),
                'status' => 'picked'
            ]);
        
            
            return redirect('/');
        }
}
