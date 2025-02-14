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
    
        public function logKey() {
            request()->validate([
                'picked_by' => 'required|exists:employees,id',
                'key_name' => 'required',
            ]);
        
            $employee = Employee::findOrFail(request('picked_by'));
        
            $activeKeyEvent = KeyEvent::where('status', 'picked')
                ->whereNull('returned_at')
                ->first();
        
            if ($activeKeyEvent) {
                return redirect()->back()->with('error', "Key has already been picked.");
            }
        
            KeyEvent::create([
                'key_name' => request('key_name'),
                'picked_by' => $employee->id,
                'picked_at' => Carbon::now(),
                'status' => 'picked'
            ]);
        
            return redirect('/');
        }
        


        // public function submitKey(KeyEvent $keyEvent){

        //     $employees = Employee::get();

        //     return view('keys.submit-key',compact('employees'),['key_events'=>$keyEvent]);
        // }


        public function submitKey(KeyEvent $keyEvent){
            $employees = Employee::all();
            return view('keys.submit-key',[
                'employees' => $employees,
                'keyEvent'  => $keyEvent
            ]);
        }

        public function returnKey(KeyEvent  $keyEvent){
            request()->validate([
                'returned_by' => 'required|exists:employees,id',
            ]);

            

            $keyEvent->update([
                'returned_by'   =>  request('returned_by'),
                'status'=>'returned',
                'returned_at' =>Carbon::now()
            ]);
        }
}
