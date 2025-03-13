<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Employee;
use App\Models\Key;
use App\Models\KeyEvent;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KeyEventController extends Controller
{



    public function pickedKeys(){
        $keys = KeyEvent::with(['key', 'employee'])->orderBy('status')->get();


        return view('keys.keys',compact('keys'));
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
        

            $pickedKey = Key::findOrFail(request('key_number'));
            $employee = Employee::findOrFail(request('picked_by'));

            
            $employeeName = $employee->first_name . ' ' . $employee->last_name;

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

            Activities::log(
                action: 'Logged Key',
                description: $employeeName . ' ' . ' picked the ' . $pickedKey->key_name . ' key.'            
            );
        
            return redirect('/');
        }
        


        // public function submitKey(KeyEvent $keyEvent){

        //     $employees = Employee::get();

        //     return view('keys.submit-key',compact('employees'),['key_events'=>$keyEvent]);
        // }


        public function submitKey(KeyEvent $keyEvent){
            $employees = Employee::all();

            // dd($keyEvent->key()->first()->key_name);
            return view('keys.submit-key',[
                'employees' => $employees,
                'keyEvent'  => $keyEvent
            ]);
        }

        public function returnKey(KeyEvent  $keyEvent){
            request()->validate([
                'returned_by' => 'required|exists:employees,id',
            ]);

            $returnEmployee = Employee::findOrFail(request('returned_by'));

            $employeeName = $returnEmployee->first_name . ' ' . $returnEmployee->last_name;


            $key = Key::findOrFail($keyEvent->key_number);
            
// dd($key->key_name);
            $keyEvent->update([
                'returned_by'   =>  request('returned_by'),
                'status'=>'returned',
                'returned_at' =>Carbon::now()
            ]);

            Activities::log(
                action: 'Key Returned',
                description: $employeeName . ' returned the ' . $key->key_name . ' key.'
            );

            
            return redirect('/');
        }
}
