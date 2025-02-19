<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Key;
use App\Models\KeyEvent;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KeyEventController extends Controller
{



    public function pickedKeys(){
        $keys   =   KeyEvent::where('status', 'picked')
        ->with(['key','employee'])
        ->simplePaginate(10);

        return view('index',compact('keys'));
    }
    public function pickKey(){
        
        $employees = Employee::get();
        $keys = Key::get();
        return view('keys.create',compact('employees','keys'));
        }
    
        public function logKey() {

            request()->validate([
                'picked_by' => 'required|exists:employees,id',
                'key_number' => 'required',
            ]);
        
            $employee = Employee::findOrFail(request('picked_by'));

            // dd('Hello there');
            // dd($employee);
        
            $activeKeyEvent =   KeyEvent::where('key_number',request('key_number'))
            ->where('status','picked')
            ->whereNull('returned_at')
            ->first();
        
            if ($activeKeyEvent) {
                return redirect()->back()->with('error', "Key has already been picked.");
            }
        
            KeyEvent::create([
                'key_number' => request('key_number'),
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

            
            return redirect('/');
        }
}
