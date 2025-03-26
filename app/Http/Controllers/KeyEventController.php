<?php

namespace App\Http\Controllers;

use App\Models\{Activities, Employee, Key, KeyEvent};
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

            Log::debug('pick key');
            request()->validate([
                'picked_by' => 'required|exists:employees,id',
                'key_name' => 'required',
            ]);
            Log::debug('staff ' . request('picked_by'));

            $pickedKey = Key::where('key_name', request('key_name'))->firstOrFail();

            $key_number = $pickedKey->key_id;


            Log::debug('key details: ' . $pickedKey);
        

            $employee = Employee::findOrFail(request('picked_by'));
            
            // dd('Hello there');
            // dd($employee);
        
            $activeKeyEvent =   KeyEvent::where('key_number',$key_number)
            ->where('status','picked')
            ->whereNull('returned_at')
            ->first();
            
            Log::debug('Active key details: ' . $activeKeyEvent);
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

            try{
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

            return response()->json([
                'success'=> true,
                'message'=> "The key '{$key->key_name}' has been returned."
            ]);
            } catch(\Exception $e){
                return response()->json([
                    'success'=> false,
                    'error'=>"Failed to return key. Please try again"
                ], 500);
            }


            
            // return redirect('/');
        }
}
